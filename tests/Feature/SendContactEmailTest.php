<?php

namespace Tests\Feature;

use App\Jobs\SendContactEmail;
use App\Mail\ContactMessage;
use Illuminate\Mail\PendingMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Mockery;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Component\Mailer\Exception\TransportException;
use Tests\TestCase;

class SendContactEmailTest extends TestCase
{
    #[DataProvider('smtpFailures')]
    public function test_smtp_failures_log_the_cause_without_credentials(?string $username, ?string $password, string $error, int $code, string $expected): void
    {
        config([
            'mail.to_address' => 'inbox@example.com',
            'mail.mailers.smtp.username' => $username,
            'mail.mailers.smtp.password' => $password,
        ]);

        $pendingMail = Mockery::mock(PendingMail::class);
        Mail::shouldReceive('to')->once()->with('inbox@example.com')->andReturn($pendingMail);
        $pendingMail->shouldReceive('send')->once()
            ->with(Mockery::type(ContactMessage::class))
            ->andThrow(new TransportException($error, $code));

        Log::shouldReceive('warning')->once()
            ->with('Contact email could not be sent.', [
                'exception_type' => TransportException::class,
                'exception_code' => $code,
                'exception_message' => $expected,
            ]);

        (new SendContactEmail([
            'name' => 'Test',
            'email' => 'visitor@example.com',
        ]))->handle();
    }

    public static function smtpFailures(): array
    {
        $username = 'sender@example.com';
        $password = 'dummy+password';

        return [
            'authentication error with credentials' => [
                $username,
                $password,
                'Authentication failed for '.$username.': '.$password.' '.rawurlencode($password).' '.base64_encode($password),
                535,
                'Authentication failed for [redacted]: [redacted] [redacted] [redacted]',
            ],
            'connection timeout without credentials' => [
                null,
                null,
                'Connection to smtp.gmail.com:587 timed out',
                0,
                'Connection to smtp.gmail.com:587 timed out',
            ],
        ];
    }
}

<?php

namespace App\Jobs;

use App\Mail\ContactMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendContactEmail implements ShouldQueue
{
    use Queueable;

    public function __construct(public array $data) {}

    public function handle(): void
    {
        try {
            Mail::to(config('mail.to_address'))->send(new ContactMessage($this->data));
        } catch (Throwable $exception) {
            $message = $exception->getMessage();

            foreach (['username', 'password'] as $key) {
                $value = config("mail.mailers.smtp.{$key}");

                if (is_string($value) && $value !== '') {
                    $message = str_replace([$value, rawurlencode($value), base64_encode($value)], '[redacted]', $message);
                }
            }

            Log::warning('Contact email could not be sent.', [
                'exception_type' => $exception::class,
                'exception_code' => $exception->getCode(),
                'exception_message' => $message,
            ]);
        }
    }
}

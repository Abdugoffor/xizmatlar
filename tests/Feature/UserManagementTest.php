<?php

namespace Tests\Feature;

use App\Models\Language;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        require_once app_path('helpers.php');

        Language::create(['name' => 'uz', 'is_active' => true]);
        Language::create(['name' => 'ru', 'is_active' => true]);

        $this->actingAs(User::factory()->create(['role' => 'admin']));
    }

    public function test_update_uses_the_user_id_after_the_language_parameter(): void
    {
        $user = User::factory()->create();

        $this->put('/uz/users/'.$user->id, [
            'name' => 'Updated name',
            'email' => $user->email,
            'role' => 'admin',
            'password' => 'new-password',
        ])->assertRedirect('/uz/users')->assertSessionHasNoErrors();

        $user->refresh();
        $this->assertSame('Updated name', $user->name);
        $this->assertSame('admin', $user->role);
        $this->assertTrue(Hash::check('new-password', $user->password));
    }

    #[DataProvider('unchangedPasswords')]
    public function test_update_preserves_the_password_when_no_new_password_is_given(string $lang, array $password): void
    {
        $user = User::factory()->create();
        $originalPassword = $user->password;

        $this->patch('/'.$lang.'/users/'.$user->id, array_merge([
            'name' => 'Updated name',
            'email' => 'updated@example.com',
            'role' => 'user',
        ], $password))->assertRedirect('/'.$lang.'/users')->assertSessionHasNoErrors();

        $user->refresh();
        $this->assertSame('Updated name', $user->name);
        $this->assertSame('updated@example.com', $user->email);
        $this->assertSame($originalPassword, $user->password);
    }

    public static function unchangedPasswords(): array
    {
        return [
            'blank password in Uzbek' => ['uz', ['password' => '']],
            'null password in Russian' => ['ru', ['password' => null]],
            'omitted password in Uzbek' => ['uz', []],
        ];
    }

    public function test_edit_loads_the_requested_user_without_exposing_or_repopulating_the_password(): void
    {
        $user = User::factory()->create();

        $this->withSession(['_old_input' => ['password' => 'previously-entered-secret']])
            ->get('/ru/users/'.$user->id.'/edit')
            ->assertOk()
            ->assertViewHas('model', fn (User $model) => $model->is($user))
            ->assertSee('type="password"', false)
            ->assertDontSee($user->password, false)
            ->assertDontSee('previously-entered-secret', false);
    }

    public function test_duplicate_email_is_rejected_without_changing_the_user(): void
    {
        $user = User::factory()->create();
        $other = User::factory()->create();

        $this->from('/uz/users/'.$user->id.'/edit')
            ->put('/uz/users/'.$user->id, [
                'name' => 'Changed name',
                'email' => $other->email,
                'role' => 'user',
                'password' => 'new-password',
            ])->assertRedirect('/uz/users/'.$user->id.'/edit')
            ->assertSessionHasErrors('email');

        $this->assertSame($user->email, $user->fresh()->email);
        $this->assertSame($user->name, $user->fresh()->name);
    }

    public function test_show_loads_the_requested_user_without_exposing_the_password(): void
    {
        $user = User::factory()->create();

        $this->get('/uz/users/'.$user->id)
            ->assertOk()
            ->assertViewHas('model', fn (User $model) => $model->is($user))
            ->assertDontSee($user->password, false);
    }

    public function test_delete_uses_the_user_id_after_the_language_parameter(): void
    {
        $user = User::factory()->create();
        $adminId = auth()->id();

        $this->delete('/ru/users/'.$user->id)->assertRedirect('/ru/users');

        $this->assertModelMissing($user);
        $this->assertDatabaseHas('users', ['id' => $adminId]);
    }
}

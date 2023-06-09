<?php

namespace Tests\Feature;

use App\Mail\UserRegisteredEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Support\Str;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_page_is_accessible(): void
    {
        $response = $this->get(route('registration'));

        $response->assertSuccessful();
    }

    public function test_register_all_input_is_provided()
    {
    $this->withoutMiddleware();
    $token  = Str::random(40);
    $response = $this->post(route('register'), [
        '_token' => csrf_token(),
        'username' => 'tom',
        'email' => 'example@redberry.ge',
        'password' => 'password',
        'repeatPassword' => 'password',
        'token' => $token
    ]);

    $this->assertDatabaseHas('users', [
        'username' => 'tom',
        'email' => 'example@redberry.ge',
    ]);
}

    public function test_register_if_email_send_when_user_press_sign_up_button()
{
    $this->withoutMiddleware();
    $token = Str::random(40);
    $email = 'tamazi.akhalaia@redberry.ge';
    $username = 'john';
    $response = $this->post(route('register'), [
        'username' => $username,
        'email' => $email,
        'password' => 'password',
        'repeatPassword' => 'password',
        'token' => $token
    ]);

    $this->assertDatabaseHas('users', [
        'username' => $username,
        'email' => $email,
    ]);

    Mail::to($email)->send(new UserRegisteredEmail($username,$token));
}

}

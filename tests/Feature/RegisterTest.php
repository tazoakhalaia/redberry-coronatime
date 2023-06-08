<?php

namespace Tests\Feature;

use App\Mail\UserRegisteredEmail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Support\Str;

class RegisterTest extends TestCase
{
    public function test_register_page_is_accessible(): void
    {
        $response = $this->get('/register');

        $response->assertSuccessful();
    }

    public function test_register_all_input_is_provided()
    {
        $this->withoutMiddleware();
        $token  = Str::random(40);
        $response = $this->post('/register',[
            '_token' => csrf_token(),
            'username' => 'tom',
            'email' => 'example@redberry.ge',
            'password' => 'password',
            'repeatPassword' => 'password',
            'token' => $token
        ]);

        $response->assertRedirect('/send-email');
    }

    public function test_register_if_email_send_when_user_press_sign_up_button()
{
    $this->withoutMiddleware();
    $response = $this->post('/register', [
        'username' => 'john',
        'email' => 'example@redberry.ge',
        'password' => '$2y$10$jsgupMcOItKuah5gsixP4u9zwyOPhP05fRh/laowYh4euIRezH3Dy',
        'repeatPassword' => '$2y$10$jsgupMcOItKuah5gsixP4u9zwyOPhP05fRh/laowYh4euIRezH3Dy',
        'token' => Str::random(40)
    ]);

    $response->assertRedirect('/send-email');

    $this->assertTrue(Mail::to($response->email)->send(new UserRegisteredEmail($response->username,$response->token)));
}

}

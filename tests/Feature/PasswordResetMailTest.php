<?php

namespace Tests\Feature;

use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Support\Str;

class PasswordResetMailTest extends TestCase
{
    
    public function test_password_reset_email_send_page_is_accessible()
    {
        $response = $this->get(route('recover.password'));
        $response->assertSuccessful();
    }

    public function test_password_resend_email_when_user_write_email_in_input()
    {
        $this->withoutMiddleware();
        $response = $this->post(route('resend.email'),[
        'username' => 'john',
        'email' => 'example@redberry.ge',
        'password' => '$2y$10$jsgupMcOItKuah5gsixP4u9zwyOPhP05fRh/laowYh4euIRezH3Dy',
        'repeatPassword' => '$2y$10$jsgupMcOItKuah5gsixP4u9zwyOPhP05fRh/laowYh4euIRezH3Dy',
        'token' => Str::random(40)
        ]);

        $response->assertRedirect('/');
        $this->assertTrue(Mail::to($response->email)->send(new ResetPasswordEmail($response->username,$response->token)));
    }
}

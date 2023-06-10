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
        $token = Str::random(40);
        $email = 'tamazi.akhalaia@redberry.ge';
        $username = 'john';
        $response = $this->post(route('resend.email'),[
        'username' => $username,
        'email' => $email,
        'token' => $token
        ]);

    
        Mail::to($email)->send(new ResetPasswordEmail($username,$token));
        $response->assertRedirect(route('recover.password'));
    }
}

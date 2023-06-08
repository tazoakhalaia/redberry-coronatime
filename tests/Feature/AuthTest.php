<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
   
    use RefreshDatabase;

    public function test_login_page_is_accessible()
    {
        $response = $this->get(route('signup'));
        $response->assertSuccessful();
    }

    public function test_auth_give_us_error_if_input_is_not_provided()
    {
        $this->withoutMiddleware();
       $response = $this->post(route('login'));
       $response->assertSessionHasErrors([
        'username_or_email',
        'password'
       ]);
    }

    public function test_auth_give_us_email_error_if_we_wont_provide_email_input()
    {
        $this->withoutMiddleware();
        $response = $this->post(route('login'), [
            'password' => 'password'
        ]);

        $response->assertSessionHasErrors([
            'username_or_email'
        ]);

        $response->assertSessionDoesntHaveErrors(['password']);

    }

    public function test_auth_give_us_password_error_if_we_wont_provide_passowrd_input()
    {
        $this->withoutMiddleware();
        $response = $this->post(route('login'), [
            'username_or_email' => 'example@redberry.ge'
        ]);

        $response->assertSessionHasErrors([
            'password'
        ]);

        $response->assertSessionDoesntHaveErrors(['username_or_email']);

    }

    public function test_auth_give_us_credential_error_if_user_does_not_exist()
    {
        $this->withoutMiddleware();
       $response = $this->post(route('login'), [
        'username_or_email' => 'example@redberry.ge',
        'password' => 'password'
       ]);

       $response->assertSessionHasErrors([
        'error' => 'Invalid username or password.',
    ]);
    }

    public function test_user_can_login_if_verified()
{
    $this->withoutMiddleware();
    $user = User::factory()->count(1)->make();
    $response = $this->post(route('login'), [
        'username_or_email' => $user[0]->email,
        'password' => $user[0]->password,
    ]);

    $response->assertRedirect(route('signup')); 
}
}

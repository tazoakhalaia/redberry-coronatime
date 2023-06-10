<?php

namespace Tests\Feature;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class UpdatePasswordTest extends TestCase
{
    use RefreshDatabase;

public function test_password_update__password_after_get_user_with_token()
{
  
    $this->withoutMiddleware();

    $token = Str::random(40);
    $user = User::create([
        'username' => 'john',
        'email' => 'example@redberry.ge',
        'password' => '123456',
        'token' => $token,
    ]);

    $response = $this->post(route('update.password', $token), [
        'password' => 'password',
        'repeatPassword' => 'password',
    ]);

    $response->assertRedirect(route('signup'));

}
}

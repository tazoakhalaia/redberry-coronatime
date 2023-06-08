<?php

namespace Tests\Feature;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UpdatePasswordTest extends TestCase
{
    public function test_password_update_page_is_accessible()
{
    $this->withoutMiddleware();
    $user = User::factory()->count(1)->make();

    $response = $this->get('/change-password/' . $user->token);
}

public function test_password_update__password_after_get_user_with_token()
{
    $user = User::factory()->create();

    $response = $this->post('/update-password/' . $user->token, [
        'password' => Hash::make('password'),
        'repeatPassword' => Hash::make('password'),
    ]);

    $response->assertRedirect('/');
}
}

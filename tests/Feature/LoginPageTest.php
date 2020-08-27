<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_navigate_login_page()
    {
        $response = $this->get('/login');
        $response->assertSee(trans('auth.login'));
        $response->assertSee(trans('auth.username'));
        $response->assertSee(trans('auth.pass'));
    }

    public function test_user_can_login_by_valid_user()
    {
        $user = factory(User::class)->create(['password' => Hash::make('123456789')]);
        $response = $this->json(
            'POST',
            '/login',
            ['username' => $user->username, 'password' => '123456789']);

        $response->assertRedirect(route('home'));
    }

    public function test_user_can_login_by_invalid_user()
    {
        $invalidUser = ['username' => 'abcxyzk', 'password' => 'wrongpassword'];
        $response = $this->json(
            'POST',
            '/login',
            $invalidUser);

        $response->assertSee(trans('auth.failed'));
    }
}

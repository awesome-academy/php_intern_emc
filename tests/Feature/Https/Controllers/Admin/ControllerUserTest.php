<?php

namespace Tests\Feature\Https\Controllers\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Mockery;

class ControllerUserTest extends TestCase
{
    protected $userMock;
    protected $orderMock;
    protected $controller;

    protected function setUp(): void
    {
        $this->afterApplicationCreated(function () {
            $this->userMock = Mockery::mock($this->app->make(UserRepositoryInterface::class));
            $this->orderMock = Mockery::mock($this->app->make(OrderRepositoryInterface::class));

            $this->controller = new UserController(
                $this->userMock,
                $this->orderMock
            );
        });
        parent::setUp();
    }

    public function test_index_view_user()
    {
        $this->userMock->shouldReceive('getAllUsers')->once()->andReturn(User::class);

        $view = $this->controller->index();

        $this->assertEquals('admin.users.index', $view->getName());
        $this->assertArrayHasKey('users', $view->getData());
    }

    public function test_create_user()
    {
        $faker = Faker::create();
        $data = [
            'username' => $faker->userName,
            'full_name' => $faker->name,
            'email' => $faker->safeEmail,
            'birthday' => '2000-12-26',
            'address' => $faker->address,
            'phone_number' => '0888999043',
            'gender' => random_int(0,1),
            'password' => Hash::make('123456789'),
            'role' => 0,
        ];

        $user = $this->userMock->create($data);

        $this->assertDatabaseHas('users', $user->toArray());
    }

    public function test_edit_user()
    {
        $user = $this->userMock->find(1);

        $view = $this->controller->edit($user);

        $this->assertEquals('admin.users.edit', $view->getName());
    }
    
    public function test_update_user()
    {
        $user = $this->userMock->find(26);
        $newFullNameUser = ['full_name' => 'Admin Updated'];

        $result = $this->userMock->update($user->id, $newFullNameUser);

        $this->assertTrue(true, $result);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'full_name' => $newFullNameUser['full_name'],
        ]);
    }

    public function test_destroy_user()
    {
        $user = factory(User::class)->create();

        $result = $this->controller->destroy($user->id);
        
        $this->assertTrue(true, $result);
        $this->assertDatabaseMissing('users', $user->toArray());
    }

    public function test_user_has_order()
    {
        $view = $this->controller->order(1);

        $this->assertEquals('admin.users.detail', $view->getName());
        $this->assertArrayHasKey('orders', $view->getData());
    }
}

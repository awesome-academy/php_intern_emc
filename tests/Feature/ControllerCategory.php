<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\CategoryController;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Mockery;

class ControllerCategory extends TestCase
{
    protected $mock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock = Mockery::mock(CategoryRepositoryInterface::class);
    }

    public function test_view_admin_category()
    {
        $this->mock->shouldReceive('getAll')->once()->andReturn(Category::class);
        $controller = new CategoryController($this->mock);
        $view = $controller->index();

        $this->assertEquals('admin.categories.index', $view->getName());
        $this->assertArrayHasKey('categories', $view->getData());
    }

    public function test_delete_category()
    {
        $this->mock->shouldReceive('delete')->once()->andReturn(true);
        $controller = new CategoryController($this->mock);

        $result = $controller->destroy(146);

        $this->assertTrue(true, $result);
    }

    public function test_create_category()
    {
        $data = [
            'name' => 'Van Hoc', 
        ];

        $this->postJson('/admin/categories')->assertStatus(422);
        $this->postJson('/admin/categories', $data)->assertStatus(302);
    }

    public function test_edit_category()
    {
        $category = factory(Category::class)->create([
            'name' => 'Van Chuong',
        ]);

        $response = $this->get(route('categories.edit',['id' => $category->id]));

        $response->assertSee($category->name);
        $response->assertSee($category->parent_id);
    }
}

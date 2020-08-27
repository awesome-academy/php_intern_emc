<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\Eloquent\CategoryRepository;
use App\Models\Category;
use App\Models\Product;

class CategoryTest extends TestCase
{
    protected $categoryRepository;
    protected $category;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = factory(Category::class)->create();
        $this->categoryRepository = new CategoryRepository();
    }

    protected function tearDown(): void
    {
        $this->categoryRepository->delete($this->category->id);
    }

    // Test CRUD
    public function test_create_category()
    {
        $this->assertDatabaseHas('categories', $this->category->toArray());
    }

    public function test_show_category()
    {
        $foundCategory = $this->categoryRepository->find($this->category->id);

        $this->assertEquals($this->category->name, $foundCategory->name);
    }

    public function test_update_category()
    {
        $updateCategory = $this->categoryRepository->update(
            $this->category->id, 
            ['name' => 'Category updated']
        );

        $this->assertTrue($updateCategory);
    }

    // Test Relationship
    public function test_category_has_many_product()
    {
        $product = factory(Product::class)->create([
            'category_id' => $this->category->id,
        ]);

        $this->assertTrue($this->category->products->contains($product));
    }

    public function test_category_has_many_child_category()
    {
        $childCategory = factory(Category::class)->create([
            'parent_id' => $this->category->id,
        ]);

        $this->assertTrue($this->category->children->contains($childCategory));
    }

    public function test_category_belongs_to_category()
    {
        $childCategory = factory(Category::class)->make([
            'parent_id' => $this->category->id,
        ]);

        $this->assertInstanceOf(Category::class, $childCategory->parrent);
    }

}

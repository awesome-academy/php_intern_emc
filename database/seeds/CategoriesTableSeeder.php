<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        $categories = [
            ['name' => 'Thiếu Nhi', 'parent_id' => null],
            ['name' => 'Văn Học', 'parent_id' => null],
            ['name' => 'Tâm Lý - Kỹ Năng Sống', 'parent_id' => null],
            ['name' => 'Sách Học Ngoại Ngữ', 'parent_id' => null],
            ['name' => 'Kinh Tế', 'parent_id' => null],
            ['name' => 'Lịch Sử - Địa Lý', 'parent_id' => null],
            ['name' => 'Khoa Học Kỹ Thuật', 'parent_id' => null],
            ['name' => 'Nuôi Dạy Con', 'parent_id' => null],
            ['name' => 'Nữ Công Gia Chánh', 'parent_id' => null],
            ['name' => 'Chính Trị - Pháp Lý ', 'parent_id' => null],
            ['name' => 'Tiểu Sử Hồi Ký', 'parent_id' => null],
        ];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'parent_id' => $category['parent_id']
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}

<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('products')->truncate();
        $products = [
            ['Thanh Gươm Diệt Quỷ - Kimetsu No Yaiba', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'thanh-guom-diet-quy-tap-13.jpg', 10, 100000, 10, 1],
            ['Dấu Chân Trên Cát - Kimetsu No Yaiba', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'image_195509_1_12629.jpg', 11, 70000, 10, 2],
            ['Sách Giáo Khoa Bộ Lớp 10', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'image_195509_1_41275.jpg', 18, 80000, 10, 3],
            ['Hoàng Tử Vệ Thần Nhà Momochi', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'hoang-tu-ve-than-nha-momochi-tap-3.jpg', 22, 90000, 10, 1],
            ['Nhà Giả Kim (Tái Bản 2017)', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', '8935235213746.jpg', 10, 75000, 10, 2],
            ['Sách Giáo Khoa Bộ Lớp 12', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'image_195509_1_41278.jpg', 5, 55000, 10, 3],
            ['Black Clover - Tập 6: Kẻ Chém Tan Cái Chết ', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'black-clover-tap-6.jpg', 7, 36000, 10, 1],
            ['THành Trình Của Elaina - Kimetsu No Yaiba', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'img_7289_1.jpg', 6, 150000, 10, 2],
            ['Sách Giáo Khoa Bộ Lớp 11 Cơ Bản', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'image_195509_1_41276.jpg', 9, 175000, 10, 3],
            ['Thanh Gươm Diệt Quỷ - Kimetsu No Yaiba', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'Quỷ Thượng huyền Hantengu và Gyokko đã đến tấn công làng thợ rèn - nơi được ẩn giấu vô cùng tuyệt mật!', 'thanh-guom-diet-quy-tap-13.jpg', 2, 56000, 10, 4],
        ];
        foreach ($products as $product) {
            DB::table('products')->insert([
                'name' => $product[0],
                'description' => $product[1],
                'information' => $product[2],
                'image' => $product[3],
                'stock_amount' => $product[4],
                'price' => $product[5],
                'discount' => $product[6],
                'category_id' => $product[7],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}

<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'full_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'birthday' => '1998-02-02',
            'address' => 'Hue',
            'phone_number' => '0888888888',
            'gender' => '1',
            'role' => '1',
        ]);

        DB::table('users')->insert([
            'username' => 'khach hang',
            'full_name' => 'khach hang',
            'email' => 'khachhang@gmail.com',
            'password' => Hash::make('123456'),
            'birthday' => '1998-02-02',
            'address' => 'Hue',
            'phone_number' => '0888888899',
            'gender' => '1',
            'role' => '0',
        ]);
    }
}

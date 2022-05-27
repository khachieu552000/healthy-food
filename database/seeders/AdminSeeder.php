<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 1,
        ]);
        DB::table('nhan_vien')->insert([
            'user_id' => 1,
            'ho_ten' => 'Trần Minh Phương',
            'gioi_tinh' => 'Nữ',
            'ngay_sinh' => \Carbon\Carbon::now(),
            'dia_chi' => 'Nam Định',
            'dien_thoai' => '12345678',
        ]);
    }
}

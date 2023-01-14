<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Super Admin',
            'email'=>'admin@admin.com',
            'password'=>'$2y$10$7DpaSP78yMqThotb5e2oye.BBintz/7Z1lw77acJyytG0q9eXzFwK', //123456789
        ]);
    }
}

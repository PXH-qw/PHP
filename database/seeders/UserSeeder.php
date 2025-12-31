<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 创建管理员用户
        User::create([
            'name' => '管理员',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // 创建普通客户用户
        User::create([
            'name' => '测试用户',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
            'role' => 'customer',
        ]);

        // 创建另一个客户用户
        User::create([
            'name' => '张三',
            'email' => 'zhangsan@example.com',
            'password' => Hash::make('password123'),
            'role' => 'customer',
        ]);

        // 创建另一个管理员用户
        User::create([
            'name' => '李管理员',
            'email' => 'liadmin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
    }
}
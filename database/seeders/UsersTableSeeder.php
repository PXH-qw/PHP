<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 创建10个测试用户
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "用户{$i}",
                'email' => "user{$i}@example.com",
                'password' => Hash::make('password'),
            ]);
        }
    }
}

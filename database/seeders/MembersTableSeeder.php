<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 创建10个测试会员
        $members = [
            [
                'name' => '张三',
                'email' => 'zhangsan@example.com',
                'phone' => '13800138001',
                'membership_start_date' => now()->subDays(30),
                'membership_end_date' => now()->addDays(335),
                'member_type' => '年卡会员',
            ],
            [
                'name' => '李四',
                'email' => 'lisi@example.com',
                'phone' => '13800138002',
                'membership_start_date' => now()->subDays(45),
                'membership_end_date' => now()->addDays(320),
                'member_type' => '年卡会员',
            ],
            [
                'name' => '王五',
                'email' => 'wangwu@example.com',
                'phone' => '13800138003',
                'membership_start_date' => now()->subDays(60),
                'membership_end_date' => now()->addDays(305),
                'member_type' => '年卡会员',
            ],
            [
                'name' => '赵六',
                'email' => 'zhaoliu@example.com',
                'phone' => '13800138004',
                'membership_start_date' => now()->subDays(15),
                'membership_end_date' => now()->addDays(350),
                'member_type' => '季卡会员',
            ],
            [
                'name' => '钱七',
                'email' => 'qianqi@example.com',
                'phone' => '13800138005',
                'membership_start_date' => now()->subDays(90),
                'membership_end_date' => now()->addDays(275),
                'member_type' => '年卡会员',
            ],
            [
                'name' => '孙八',
                'email' => 'sunba@example.com',
                'phone' => '13800138006',
                'membership_start_date' => now()->subDays(120),
                'membership_end_date' => now()->addDays(245),
                'member_type' => '年卡会员',
            ],
            [
                'name' => '周九',
                'email' => 'zhoujiu@example.com',
                'phone' => '13800138007',
                'membership_start_date' => now()->subDays(20),
                'membership_end_date' => now()->addDays(345),
                'member_type' => '月卡会员',
            ],
            [
                'name' => '吴十',
                'email' => 'wushi@example.com',
                'phone' => '13800138008',
                'membership_start_date' => now()->subDays(25),
                'membership_end_date' => now()->addDays(340),
                'member_type' => '季卡会员',
            ],
            [
                'name' => '郑一',
                'email' => 'zhengyi@example.com',
                'phone' => '13800138009',
                'membership_start_date' => now()->subDays(75),
                'membership_end_date' => now()->addDays(290),
                'member_type' => '年卡会员',
            ],
            [
                'name' => '陈二',
                'email' => 'chener@example.com',
                'phone' => '13800138010',
                'membership_start_date' => now()->subDays(10),
                'membership_end_date' => now()->addDays(355),
                'member_type' => '月卡会员',
            ],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}

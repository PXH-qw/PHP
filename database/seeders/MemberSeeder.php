<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;
use App\Models\User;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 创建测试会员数据
        $members = [
            [
                'name' => '张三',
                'email' => 'zhangsan@example.com',
                'phone' => '13800138001',
                'membership_start_date' => now()->subDays(30),
                'membership_end_date' => now()->addDays(335),
                'member_type' => '年费会员',
                'user_id' => 2, // 关联到第二个用户
            ],
            [
                'name' => '李四',
                'email' => 'lisi@example.com',
                'phone' => '13800138002',
                'membership_start_date' => now()->subDays(60),
                'membership_end_date' => now()->addDays(305),
                'member_type' => '年费会员',
                'user_id' => 3,
            ],
            [
                'name' => '王五',
                'email' => 'wangwu@example.com',
                'phone' => '13800138003',
                'membership_start_date' => now()->subDays(15),
                'membership_end_date' => now()->addDays(350),
                'member_type' => '季费会员',
                'user_id' => 4,
            ],
            [
                'name' => '赵六',
                'email' => 'zhaoliu@example.com',
                'phone' => '13800138004',
                'membership_start_date' => now()->subDays(45),
                'membership_end_date' => now()->addDays(320),
                'member_type' => '月费会员',
                'user_id' => 5,
            ],
            [
                'name' => '钱七',
                'email' => 'qianqi@example.com',
                'phone' => '13800138005',
                'membership_start_date' => now()->subDays(90),
                'membership_end_date' => now()->addDays(275),
                'member_type' => '年费会员',
                'user_id' => 6,
            ],
            [
                'name' => '陈八',
                'email' => 'chenba@example.com',
                'phone' => '13800138006',
                'membership_start_date' => now()->subDays(120),
                'membership_end_date' => now()->addDays(245),
                'member_type' => '季费会员',
                'user_id' => null, // 没有关联用户
            ],
            [
                'name' => '周九',
                'email' => 'zhoujiu@example.com',
                'phone' => '13800138007',
                'membership_start_date' => now()->subDays(25),
                'membership_end_date' => now()->addDays(340),
                'member_type' => '月费会员',
                'user_id' => null,
            ],
            [
                'name' => '吴十',
                'email' => 'wushi@example.com',
                'phone' => '13800138008',
                'membership_start_date' => now()->subDays(75),
                'membership_end_date' => now()->addDays(290),
                'member_type' => '年费会员',
                'user_id' => null,
            ],
            [
                'name' => '郑一',
                'email' => 'zhengyi@example.com',
                'phone' => '13800138009',
                'membership_start_date' => now()->subDays(100),
                'membership_end_date' => now()->addDays(265),
                'member_type' => '季费会员',
                'user_id' => null,
            ],
            [
                'name' => '刘二',
                'email' => 'liuer@example.com',
                'phone' => '13800138010',
                'membership_start_date' => now()->subDays(10),
                'membership_end_date' => now()->addDays(355),
                'member_type' => '月费会员',
                'user_id' => null,
            ],
            [
                'name' => '杨三',
                'email' => 'yangsan@example.com',
                'phone' => '13800138011',
                'membership_start_date' => now()->subDays(200),
                'membership_end_date' => now()->addDays(165),
                'member_type' => '年费会员',
                'user_id' => null,
            ],
            [
                'name' => '黄四',
                'email' => 'huangsi@example.com',
                'phone' => '13800138012',
                'membership_start_date' => now()->subDays(80),
                'membership_end_date' => now()->addDays(285),
                'member_type' => '季费会员',
                'user_id' => null,
            ],
            [
                'name' => '朱五',
                'email' => 'zhuwu@example.com',
                'phone' => '13800138013',
                'membership_start_date' => now()->subDays(40),
                'membership_end_date' => now()->addDays(325),
                'member_type' => '月费会员',
                'user_id' => null,
            ],
            [
                'name' => '秦六',
                'email' => 'qinliu@example.com',
                'phone' => '13800138014',
                'membership_start_date' => now()->subDays(180),
                'membership_end_date' => now()->addDays(185),
                'member_type' => '年费会员',
                'user_id' => null,
            ],
            [
                'name' => '何七',
                'email' => 'heqi@example.com',
                'phone' => '13800138015',
                'membership_start_date' => now()->subDays(50),
                'membership_end_date' => now()->addDays(315),
                'member_type' => '季费会员',
                'user_id' => null,
            ],
        ];

        foreach ($members as $memberData) {
            Member::create($memberData);
        }
    }
}
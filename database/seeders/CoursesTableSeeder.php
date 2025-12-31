<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 创建10个测试课程
        $courses = [
            [
                'name' => '瑜伽入门',
                'description' => '适合初学者的瑜伽课程，学习基本体式和呼吸方法',
                'instructor' => '张教练',
                'schedule' => now()->addDays(1)->setTime(9, 0),
                'max_participants' => 15,
                'current_participants' => 0,
            ],
            [
                'name' => '力量训练',
                'description' => '全面的力量训练课程，增强肌肉力量和耐力',
                'instructor' => '李教练',
                'schedule' => now()->addDays(1)->setTime(18, 0),
                'max_participants' => 10,
                'current_participants' => 0,
            ],
            [
                'name' => '有氧舞蹈',
                'description' => '有趣的有氧舞蹈课程，燃烧脂肪，提升心肺功能',
                'instructor' => '王教练',
                'schedule' => now()->addDays(2)->setTime(19, 0),
                'max_participants' => 20,
                'current_participants' => 0,
            ],
            [
                'name' => '普拉提',
                'description' => '核心力量训练，改善体态，增强身体稳定性',
                'instructor' => '刘教练',
                'schedule' => now()->addDays(3)->setTime(17, 0),
                'max_participants' => 12,
                'current_participants' => 0,
            ],
            [
                'name' => '动感单车',
                'description' => '高强度有氧运动，燃烧卡路里，提升心肺功能',
                'instructor' => '陈教练',
                'schedule' => now()->addDays(4)->setTime(18, 30),
                'max_participants' => 18,
                'current_participants' => 0,
            ],
            [
                'name' => '拳击训练',
                'description' => '全身力量训练，提高协调性和反应能力',
                'instructor' => '赵教练',
                'schedule' => now()->addDays(5)->setTime(20, 0),
                'max_participants' => 8,
                'current_participants' => 0,
            ],
            [
                'name' => '游泳基础',
                'description' => '学习标准游泳姿势，提升水感和呼吸技巧',
                'instructor' => '孙教练',
                'schedule' => now()->addDays(6)->setTime(10, 0),
                'max_participants' => 6,
                'current_participants' => 0,
            ],
            [
                'name' => '拉伸放松',
                'description' => '专业拉伸课程，缓解肌肉紧张，促进恢复',
                'instructor' => '周教练',
                'schedule' => now()->addDays(7)->setTime(16, 30),
                'max_participants' => 15,
                'current_participants' => 0,
            ],
            [
                'name' => 'HIIT高强度训练',
                'description' => '短时间内高效燃脂，提升体能和代谢',
                'instructor' => '吴教练',
                'schedule' => now()->addDays(1)->setTime(19, 30),
                'max_participants' => 12,
                'current_participants' => 0,
            ],
            [
                'name' => '核心力量训练',
                'description' => '专注核心肌群训练，提升身体稳定性',
                'instructor' => '郑教练',
                'schedule' => now()->addDays(2)->setTime(17, 0),
                'max_participants' => 10,
                'current_participants' => 0,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}

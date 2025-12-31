<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 创建测试课程数据
        $courses = [
            [
                'name' => '瑜伽基础班',
                'description' => '适合初学者的瑜伽课程，帮助您放松身心，增强柔韧性',
                'instructor' => '张教练',
                'schedule' => now()->addDays(1)->setTime(8, 0),
                'max_participants' => 15,
                'current_participants' => 8,
            ],
            [
                'name' => '动感单车',
                'description' => '高强度有氧运动，燃烧脂肪，提升心肺功能',
                'instructor' => '李教练',
                'schedule' => now()->addDays(1)->setTime(19, 0),
                'max_participants' => 20,
                'current_participants' => 12,
            ],
            [
                'name' => '力量训练',
                'description' => '器械力量训练，增强肌肉力量和体型塑造',
                'instructor' => '王教练',
                'schedule' => now()->addDays(2)->setTime(10, 0),
                'max_participants' => 10,
                'current_participants' => 6,
            ],
            [
                'name' => '搏击操',
                'description' => '结合拳击动作的有氧运动，释放压力，燃脂塑形',
                'instructor' => '赵教练',
                'schedule' => now()->addDays(2)->setTime(18, 0),
                'max_participants' => 15,
                'current_participants' => 10,
            ],
            [
                'name' => '普拉提',
                'description' => '核心力量训练，改善姿态，增强身体稳定性',
                'instructor' => '刘教练',
                'schedule' => now()->addDays(3)->setTime(9, 0),
                'max_participants' => 12,
                'current_participants' => 7,
            ],
            [
                'name' => '游泳入门',
                'description' => '适合初学者的游泳课程，教授基本泳姿和技巧',
                'instructor' => '陈教练',
                'schedule' => now()->addDays(3)->setTime(16, 0),
                'max_participants' => 8,
                'current_participants' => 5,
            ],
            [
                'name' => '有氧舞蹈',
                'description' => '流行舞蹈结合有氧运动，快乐燃脂',
                'instructor' => '孙教练',
                'schedule' => now()->addDays(4)->setTime(19, 30),
                'max_participants' => 18,
                'current_participants' => 14,
            ],
            [
                'name' => '太极养生',
                'description' => '传统太极，修身养性，适合中老年群体',
                'instructor' => '周教练',
                'schedule' => now()->addDays(5)->setTime(7, 30),
                'max_participants' => 12,
                'current_participants' => 9,
            ],
            [
                'name' => 'HIIT高强度训练',
                'description' => '高强度间歇训练，短时间内高效燃脂',
                'instructor' => '吴教练',
                'schedule' => now()->addDays(5)->setTime(20, 0),
                'max_participants' => 15,
                'current_participants' => 11,
            ],
            [
                'name' => '儿童体适能',
                'description' => '专为儿童设计的体能训练课程',
                'instructor' => '杨教练',
                'schedule' => now()->addDays(6)->setTime(15, 0),
                'max_participants' => 10,
                'current_participants' => 7,
            ],
        ];

        foreach ($courses as $courseData) {
            Course::create($courseData);
        }
    }
}
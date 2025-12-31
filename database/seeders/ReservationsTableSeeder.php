<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 创建10个测试预约，确保user_id和course_id的组合是唯一的
        $reservations = [
            ['user_id' => 1, 'course_id' => 1, 'reservation_date' => now(), 'status' => 'confirmed'],
            ['user_id' => 2, 'course_id' => 2, 'reservation_date' => now(), 'status' => 'confirmed'],
            ['user_id' => 3, 'course_id' => 3, 'reservation_date' => now(), 'status' => 'confirmed'],
            ['user_id' => 4, 'course_id' => 4, 'reservation_date' => now(), 'status' => 'confirmed'],
            ['user_id' => 5, 'course_id' => 5, 'reservation_date' => now(), 'status' => 'confirmed'],
            ['user_id' => 6, 'course_id' => 6, 'reservation_date' => now(), 'status' => 'confirmed'],
            ['user_id' => 7, 'course_id' => 7, 'reservation_date' => now(), 'status' => 'confirmed'],
            ['user_id' => 8, 'course_id' => 8, 'reservation_date' => now(), 'status' => 'confirmed'],
            ['user_id' => 9, 'course_id' => 9, 'reservation_date' => now(), 'status' => 'confirmed'],
            ['user_id' => 10, 'course_id' => 10, 'reservation_date' => now(), 'status' => 'confirmed'],
        ];

        foreach ($reservations as $reservation) {
            Reservation::create($reservation);
        }
    }
}
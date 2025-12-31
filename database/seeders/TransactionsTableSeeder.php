<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 创建10个测试交易记录
        $transactions = [
            [
                'user_id' => 1,
                'member_id' => 1,
                'type' => 'membership_fee',
                'amount' => 2999.00,
                'description' => '年卡会员费用',
            ],
            [
                'user_id' => 2,
                'member_id' => 2,
                'type' => 'membership_fee',
                'amount' => 999.00,
                'description' => '季卡会员费用',
            ],
            [
                'user_id' => 3,
                'member_id' => 3,
                'type' => 'personal_training',
                'amount' => 1200.00,
                'description' => '私教课程费用',
            ],
            [
                'user_id' => 4,
                'member_id' => 4,
                'type' => 'membership_fee',
                'amount' => 299.00,
                'description' => '月卡会员费用',
            ],
            [
                'user_id' => 5,
                'member_id' => 5,
                'type' => 'group_class',
                'amount' => 199.00,
                'description' => '团体课程费用',
            ],
            [
                'user_id' => 6,
                'member_id' => 6,
                'type' => 'membership_fee',
                'amount' => 2999.00,
                'description' => '年卡会员费用',
            ],
            [
                'user_id' => 7,
                'member_id' => 7,
                'type' => 'swimming_fee',
                'amount' => 399.00,
                'description' => '游泳年卡费用',
            ],
            [
                'user_id' => 8,
                'member_id' => 8,
                'type' => 'membership_fee',
                'amount' => 999.00,
                'description' => '季卡会员费用',
            ],
            [
                'user_id' => 9,
                'member_id' => 9,
                'type' => 'yoga_class',
                'amount' => 599.00,
                'description' => '瑜伽课程费用',
            ],
            [
                'user_id' => 10,
                'member_id' => 10,
                'type' => 'membership_fee',
                'amount' => 299.00,
                'description' => '月卡会员费用',
            ],
        ];

        foreach ($transactions as $transaction) {
            Transaction::create($transaction);
        }
    }
}

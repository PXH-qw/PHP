<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Member;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 获取所有用户和会员的ID
        $userIds = User::pluck('id')->toArray();
        $memberIds = Member::pluck('id')->toArray();
        
        // 如果没有用户或会员，创建一些测试数据
        if (empty($userIds) || empty($memberIds)) {
            $this->command->info('缺少用户或会员数据，无法创建交易记录');
            return;
        }
        
        // 创建测试交易记录数据
        $transactions = [];
        
        for ($i = 1; $i <= 15; $i++) {
            $transactions[] = [
                'user_id' => $userIds[array_rand($userIds)],
                'member_id' => $memberIds[array_rand($memberIds)],
                'type' => $this->getRandomTransactionType(),
                'amount' => $this->getRandomAmount(),
                'description' => $this->getRandomDescription(),
                'created_at' => now()->subDays(rand(0, 30))->subHours(rand(0, 24))->subMinutes(rand(0, 60)),
                'updated_at' => now()->subDays(rand(0, 30))->subHours(rand(0, 24))->subMinutes(rand(0, 60)),
            ];
        }

        foreach ($transactions as $transactionData) {
            Transaction::create($transactionData);
        }
    }
    
    private function getRandomTransactionType(): string
    {
        $types = ['会员费', '课程费', '私教费', '器材费', '活动费', '退款'];
        return $types[array_rand($types)];
    }
    
    private function getRandomAmount(): float
    {
        $amounts = [99.99, 199.99, 299.99, 399.99, 599.99, 999.99, 1299.99, 1599.99, 1999.99];
        return $amounts[array_rand($amounts)];
    }
    
    private function getRandomDescription(): string
    {
        $descriptions = [
            '月度会员费',
            '季度课程费用',
            '私教课程费用',
            '年度会员费',
            '健身器材使用费',
            '团体活动费用',
            '私教一对一课程',
            '瑜伽课程费用',
            '游泳课程费用',
            '力量训练课程费用',
            '会员升级费用',
            '活动报名费',
            '退款处理',
            '续费优惠',
            '新课程体验'
        ];
        return $descriptions[array_rand($descriptions)];
    }
}
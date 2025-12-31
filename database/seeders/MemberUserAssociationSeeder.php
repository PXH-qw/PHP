<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\User;

class MemberUserAssociationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = Member::all();
        $users = User::all();
        
        foreach ($members as $index => $member) {
            // 将每个会员与一个用户关联
            $user = $users->get($index % $users->count()); // 循环使用用户
            $member->update(['user_id' => $user->id]);
        }
    }
}

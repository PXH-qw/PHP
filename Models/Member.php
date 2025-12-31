<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'membership_start_date',
        'membership_end_date',
        'member_type',
        'user_id',
    ];

    protected $casts = [
        'membership_start_date' => 'datetime',
        'membership_end_date' => 'datetime',
    ];

    // 与交易记录的关联（一个会员可以有多个交易记录）
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    
    // 与用户的关联（一个会员对应一个用户）
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
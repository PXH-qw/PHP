<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'member_id',
        'type',
        'amount',
        'description',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    // 与用户模型的关联
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 与会员模型的关联
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
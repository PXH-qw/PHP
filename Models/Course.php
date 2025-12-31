<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'instructor',
        'schedule',
        'max_participants',
        'current_participants',
    ];

    protected $casts = [
        'schedule' => 'datetime',
    ];

    // 与预约的关联（一个课程可以有多个预约）
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
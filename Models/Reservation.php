<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'reservation_date',
        'status',
    ];

    protected $casts = [
        'reservation_date' => 'datetime',
    ];

    // 与用户模型的关联
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 与课程模型的关联
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    // 与会员的关联（一个用户可以是一个会员）
    public function member()
    {
        return $this->hasOne(Member::class);
    }
    
    // 与预约的关联（一个用户可以有多个预约）
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
    // 与交易记录的关联（一个用户可以有多个交易记录）
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    
    // 检查是否为管理员
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    
    // 检查是否为客户
    public function isCustomer()
    {
        return $this->role === 'customer' || $this->role === null;
    }
}
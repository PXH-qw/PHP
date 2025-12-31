<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 检查并创建courses表（如果不存在）
        if (!Schema::hasTable('courses')) {
            Schema::create('courses', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description')->nullable();
                $table->string('instructor');
                $table->dateTime('schedule');
                $table->integer('max_participants')->default(0);
                $table->integer('current_participants')->default(0);
                $table->timestamps();
            });
        }

        // 检查并创建reservations表（如果不存在）
        if (!Schema::hasTable('reservations')) {
            Schema::create('reservations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('course_id')->constrained()->onDelete('cascade');
                $table->dateTime('reservation_date');
                $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
                $table->timestamps();
                
                $table->unique(['user_id', 'course_id']); // 一个用户对一个课程只能预约一次
            });
        }
        
        // 检查并创建members表（如果不存在）
        if (!Schema::hasTable('members')) {
            Schema::create('members', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('phone')->nullable();
                $table->date('membership_start_date');
                $table->date('membership_end_date');
                $table->string('member_type')->nullable();
                $table->timestamps();
            });
        }
        
        // 检查并创建transactions表（如果不存在）
        if (!Schema::hasTable('transactions')) {
            Schema::create('transactions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('member_id')->constrained()->onDelete('cascade');
                $table->string('type'); // 交易类型
                $table->decimal('amount', 10, 2); // 交易金额
                $table->string('description')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('reservations');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('members');
    }
};
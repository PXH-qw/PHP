<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 实际上在创建表时，email字段已经设置了唯一索引
        // 在我们的fitness表迁移文件中，我们为members表的email字段设置了unique()
        // 所以不需要再次添加
        
        // 如果需要为其他字段添加唯一索引，例如phone字段，我们可以这样做
        // 但是首先需要确保phone字段没有重复值
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
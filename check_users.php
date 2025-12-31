<?php
// 检查用户数据的脚本

require_once __DIR__.'/vendor/autoload.php';

// 创建Laravel应用实例
$app = require_once __DIR__.'/bootstrap/app.php';

// 从容器中获取User模型并显示所有用户
use Illuminate\Support\Facades\Facade;
use App\Models\User;

Facade::clearResolvedInstances();
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$users = User::all();

echo "用户数量: " . $users->count() . "\n";
echo "用户列表:\n";
foreach ($users as $user) {
    echo "ID: {$user->id}, Name: {$user->name}, Email: {$user->email}, Role: {$user->role}\n";
}
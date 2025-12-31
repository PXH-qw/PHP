<?php
// 简单脚本更新用户角色

require_once __DIR__.'/vendor/autoload.php';

use Illuminate\Support\Facades\Artisan;

// 创建Laravel应用实例
$app = require_once __DIR__.'/bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;

// 将ID为1的用户设为管理员，其他设为普通客户
$users = User::all();

foreach ($users as $user) {
    if ($user->id == 1) {
        $user->role = 'admin';
    } else {
        $user->role = 'customer';
    }
    $user->save();
}

echo "用户角色更新完成\n";
echo "现在有 " . User::where('role', 'admin')->count() . " 个管理员\n";
echo "现在有 " . User::where('role', 'customer')->count() . " 个普通客户\n";
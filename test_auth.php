<?php
// 简单脚本测试用户认证

require_once __DIR__.'/vendor/autoload.php';

use Illuminate\Support\Facades\Artisan;

// 创建Laravel应用实例
$app = require_once __DIR__.'/bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

// 测试用户认证
$testUsers = [
    ['email' => 'ou@example.com', 'password' => 'password'],
    ['email' => 'xiaomei@example.com', 'password' => 'password'],
    ['email' => '123@qq.com', 'password' => 'password'],
    ['email' => 'test@example.com', 'password' => 'password123'],
];

echo "测试用户认证:\n";

foreach ($testUsers as $testUser) {
    $user = User::where('email', $testUser['email'])->first();
    
    if ($user) {
        $isValid = Hash::check($testUser['password'], $user->password);
        echo "Email: {$testUser['email']}, Password: {$testUser['password']}, Valid: " . ($isValid ? 'YES' : 'NO') . "\n";
    } else {
        echo "Email: {$testUser['email']} not found\n";
    }
}

// 尝试使用Laravel的Auth系统进行认证
echo "\n使用Laravel Auth系统测试:\n";
foreach ($testUsers as $testUser) {
    $credentials = [
        'email' => $testUser['email'],
        'password' => $testUser['password']
    ];
    
    $isValid = \Illuminate\Support\Facades\Auth::validate($credentials);
    echo "Email: {$testUser['email']}, Valid: " . ($isValid ? 'YES' : 'NO') . "\n";
}
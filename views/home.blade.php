<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>健身管理系统 - 首页</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80') no-repeat center center;
            background-size: cover;
        }
        .feature-icon {
            width: 80px;
            height: 80px;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">
    <!-- 导航栏 -->
    <nav class="bg-gray-800 text-white py-4 px-6 flex justify-between items-center">
        <div class="flex items-center">
            <h1 class="text-xl font-bold">健身管理系统</h1>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('login') }}" class="text-blue-200 hover:text-white transition duration-200 flex items-center">
                登录
            </a>
            <a href="{{ route('register') }}" class="text-blue-200 hover:text-white transition duration-200 flex items-center">
                注册
            </a>
        </div>
    </nav>

    <!-- 英雄区域 -->
    <section class="hero-section text-white py-20">
        <div class="container mx-auto text-center px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">欢迎来到我们的健身世界</h1>
            <p class="text-xl mb-10 max-w-2xl mx-auto">专业的健身设施，个性化的训练计划，助您达成健康目标</p>
        </div>
    </section>

    <!-- 关于我们 -->
    <section id="about" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">关于我们</h2>
                <div class="w-20 h-1 bg-green-600 mx-auto"></div>
            </div>
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <img src="https://images.unsplash.com/photo-1549060279-7e168fce7090?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" 
                         alt="健身房环境" 
                         class="rounded-lg shadow-lg w-full" 
                         onerror="this.src='{{ asset('images/有氧.jpg') }}'">
                </div>
                <div class="md:w-1/2 md:pl-12">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">专业健身，健康生活</h3>
                    <p class="text-gray-600 mb-4">
                        我们致力于为每一位会员提供最优质的健身体验。拥有先进的健身设备，专业的教练团队，以及舒适的运动环境，帮助您实现健康目标。
                    </p>
                    <p class="text-gray-600 mb-6">
                        无论您是健身新手还是资深爱好者，我们都有适合您的训练方案和课程，让您在愉悦的环境中享受运动的乐趣。
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>先进设备</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>专业教练</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>舒适环境</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 功能区 -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">健身房功能区</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">我们提供多种专业功能区域，满足您的不同健身需求</p>
                <div class="w-20 h-1 bg-green-600 mx-auto mt-4"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6 transition duration-300 hover:shadow-xl">
                    <div class="flex justify-center mb-4">
                        <div class="feature-icon bg-blue-100 rounded-full flex items-center justify-center">
                            <svg class="h-12 w-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">力量训练区</h3>
                    <p class="text-gray-600">配备最新力量训练设备，适合增肌塑形训练</p>
                </div>
                
                <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6 transition duration-300 hover:shadow-xl">
                    <div class="flex justify-center mb-4">
                        <div class="feature-icon bg-green-100 rounded-full flex items-center justify-center">
                            <svg class="h-12 w-12 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">瑜伽室</h3>
                    <p class="text-gray-600">宁静舒适的空间，进行瑜伽、冥想和伸展训练</p>
                </div>
                
                <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6 transition duration-300 hover:shadow-xl">
                    <div class="flex justify-center mb-4">
                        <div class="feature-icon bg-purple-100 rounded-full flex items-center justify-center">
                            <svg class="h-12 w-12 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4 4 0 003 15z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">泳池</h3>
                    <p class="text-gray-600">恒温泳池，提供舒适游泳环境和水中训练</p>
                </div>
                
                <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6 transition duration-300 hover:shadow-xl">
                    <div class="flex justify-center mb-4">
                        <div class="feature-icon bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">团体课程室</h3>
                    <p class="text-gray-600">多种团体课程，享受集体运动的乐趣</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 热门课程 -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">热门课程</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">精选热门课程，帮助您达成健身目标</p>
                <div class="w-20 h-1 bg-green-600 mx-auto mt-4"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                    <div class="flex justify-center mb-4">
                        <img src="https://images.unsplash.com/photo-1534368231201-a6a0a7b43a1f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" 
                             alt="瑜伽课程" 
                             class="w-full h-48 object-cover rounded-lg" 
                             onerror="this.src='{{ asset('images/瑜伽.jpg') }}'">
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">瑜伽入门</h3>
                    <p class="text-gray-600 mt-2">适合初学者的瑜伽课程，学习基本体式和呼吸方法</p>
                    <div class="mt-4 text-sm">
                        <p><span class="font-medium">教练:</span> 张教练</p>
                        <p><span class="font-medium">时间:</span> 每周一、三 18:00-19:00</p>
                        <p><span class="font-medium">容量:</span> 15人</p>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                    <div class="flex justify-center mb-4">
                        <img src="https://images.unsplash.com/photo-1549476464-3734c638a2cd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" 
                             alt="力量训练" 
                             class="w-full h-48 object-cover rounded-lg" 
                             onerror="this.src='{{ asset('images/力量.jpg') }}'">
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">力量训练</h3>
                    <p class="text-gray-600 mt-2">全面的力量训练课程，增强肌肉力量和耐力</p>
                    <div class="mt-4 text-sm">
                        <p><span class="font-medium">教练:</span> 李教练</p>
                        <p><span class="font-medium">时间:</span> 每周二、五 19:00-20:00</p>
                        <p><span class="font-medium">容量:</span> 10人</p>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                    <div class="flex justify-center mb-4">
                        <img src="https://images.unsplash.com/photo-1542662565-7e4e66d9d8f9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1738&q=80" 
                             alt="有氧舞蹈" 
                             class="w-full h-48 object-cover rounded-lg" 
                             onerror="this.src='{{ asset('images/舞蹈.jpg') }}'">
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">有氧舞蹈</h3>
                    <p class="text-gray-600 mt-2">有趣的有氧舞蹈课程，燃烧脂肪，提升心肺功能</p>
                    <div class="mt-4 text-sm">
                        <p><span class="font-medium">教练:</span> 王教练</p>
                        <p><span class="font-medium">时间:</span> 每周四、六 18:30-19:30</p>
                        <p><span class="font-medium">容量:</span> 20人</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 专业服务团队 -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">我们的专业团队</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">经验丰富的专业教练团队，为您的健康保驾护航</p>
                <div class="w-20 h-1 bg-green-600 mx-auto mt-4"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80" 
                         alt="张教练" 
                         class="w-32 h-32 rounded-full mx-auto object-cover" 
                         onerror="this.src='{{ asset('images/placeholder.jpg') }}'">
                    <h3 class="text-xl font-bold text-gray-800 mt-4">张教练</h3>
                    <p class="text-gray-600">瑜伽教练</p>
                    <p class="text-gray-600 mt-2">5年瑜伽教学经验，擅长各类瑜伽体式指导</p>
                </div>
                
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80" 
                         alt="李教练" 
                         class="w-32 h-32 rounded-full mx-auto object-cover" 
                         onerror="this.src='{{ asset('images/placeholder.jpg') }}'">
                    <h3 class="text-xl font-bold text-gray-800 mt-4">李教练</h3>
                    <p class="text-gray-600">力量训练教练</p>
                    <p class="text-gray-600 mt-2">8年力量训练指导经验，专业体能教练</p>
                </div>
                
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=776&q=80" 
                         alt="王教练" 
                         class="w-32 h-32 rounded-full mx-auto object-cover" 
                         onerror="this.src='{{ asset('images/placeholder.jpg') }}'">
                    <h3 class="text-xl font-bold text-gray-800 mt-4">王教练</h3>
                    <p class="text-gray-600">舞蹈教练</p>
                    <p class="text-gray-600 mt-2">10年舞蹈教学经验，专业有氧舞蹈指导</p>
                </div>
                
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1489424731084-a5d8b219a5bb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80" 
                         alt="刘教练" 
                         class="w-32 h-32 rounded-full mx-auto object-cover" 
                         onerror="this.src='{{ asset('images/placeholder.jpg') }}'">
                    <h3 class="text-xl font-bold text-gray-800 mt-4">刘教练</h3>
                    <p class="text-gray-600">普拉提教练</p>
                    <p class="text-gray-600 mt-2">6年普拉提教学经验，专注核心力量训练</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 页脚 -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2025 健身管理系统. 版权所有</p>
            <p class="mt-2">联系我们: info@fitness.com | 电话: 123-456-7890</p>
        </div>
    </footer>
</body>
</html>
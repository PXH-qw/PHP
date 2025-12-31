<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '健身房管理系统')</title>
    <!-- 引入Tailwind CSS和自定义样式 -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        .sidebar.collapsed {
            width: 6rem;
        }
        .sidebar.collapsed .menu-text {
            display: none;
        }
        .sidebar .menu-text {
            display: inline;
        }
        .bg-sidebar {
            background: linear-gradient(180deg, #1a202c 0%, #2d3748 100%);
        }
        .bg-main-menu {
            background: linear-gradient(90deg, #2c5282 0%, #2b6cb0 100%);
        }
        .header {
            height: 4rem;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- 顶部固定页眉 -->
    @auth
    <header class="fixed top-0 left-0 right-0 z-50 bg-gradient-to-r from-blue-600 to-indigo-700 text-white shadow-lg header">
        <div class="container-fluid mx-auto px-4 py-3 flex justify-between items-center">
            <div>
                <h1 class="text-lg font-bold">@yield('title', '健身房管理系统')</h1>
            </div>
            
            <div class="flex items-center space-x-4">
                <span class="hidden md:inline">欢迎, {{ Auth::user()->name }}</span>
                <span class="md:hidden">{{ Auth::user()->name }}</span>
                
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-white hover:text-gray-200 transition duration-200 underline">
                        <i class="fas fa-sign-out-alt mr-1"></i>退出
                    </button>
                </form>
            </div>
        </div>
    </header>
    @endauth

    <div id="app" class="flex pt-16"> <!-- 为固定页眉预留空间 -->
        <!-- 侧边栏 -->
        <nav id="sidebar" class="sidebar bg-sidebar text-white w-64 min-h-screen transition-all duration-300 ease-in-out">
            <div class="flex flex-col h-full">
                <!-- 侧边栏头部 -->
                <div class="sidebar-header p-4 border-b border-gray-700">
                    <h1 class="text-xl font-bold flex items-center">
                        <i class="fas fa-dumbbell mr-2"></i>
                        <span id="menu-text" class="menu-text">健身房管理系统</span>
                    </h1>
                </div>

                <!-- 侧边栏菜单 -->
                <div class="flex-1 py-4 overflow-y-auto">
                    <ul class="space-y-2">
                        @if(auth()->user() && auth()->user()->isAdmin())
                        <!-- 管理员菜单 -->
                        <li>
                            <a href="{{ route('members.index') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition duration-200 hover:shadow-md">
                                <i class="fas fa-users mr-3"></i>
                                <span class="menu-text">会员管理</span>
                            </a>
                        </li>
                        
                        <!-- 课程管理菜单 -->
                        <li>
                            <a href="{{ route('courses.list') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition duration-200 hover:shadow-md">
                                <i class="fas fa-book mr-3"></i>
                                <span class="menu-text">课程管理</span>
                            </a>
                        </li>
                        
                        <!-- 用户管理菜单（仅管理员可见） -->
                        <li>
                            <a href="{{ route('users.index') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition duration-200 hover:shadow-md">
                                <i class="fas fa-user-cog mr-3"></i>
                                <span class="menu-text">用户管理</span>
                            </a>
                        </li>
                        @else
                        <!-- 客户菜单 -->
                        <li>
                            <a href="{{ route('members.index') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition duration-200 hover:shadow-md">
                                <i class="fas fa-user mr-3"></i>
                                <span class="menu-text">个人信息管理</span>
                            </a>
                        </li>
                        @endif
                        
                        <!-- 公共菜单项 -->
                        <li>
                            <a href="{{ route('courses.index') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition duration-200 hover:shadow-md">
                                <i class="fas fa-calendar-check mr-3"></i>
                                <span class="menu-text">课程预约</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="{{ route('transactions.index') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition duration-200 hover:shadow-md">
                                <i class="fas fa-receipt mr-3"></i>
                                <span class="menu-text">消费记录</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- 侧边栏底部 -->
                <div class="p-4 border-t border-gray-700">
                    @auth
                        <div class="flex items-center mb-4">
                            <div class="mr-3">
                                <i class="fas fa-user-circle text-2xl text-gray-300"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                                <span class="text-xs text-gray-400">{{ Auth::user()->role === 'admin' ? '管理员' : '客户' }}</span>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center p-2 text-red-200 hover:bg-red-700 rounded-lg transition duration-200">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                <span class="menu-text">退出登录</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="flex items-center p-2 text-blue-200 hover:bg-blue-700 rounded-lg transition duration-200">
                            <i class="fas fa-sign-in-alt mr-3"></i>
                            <span class="menu-text">登录</span>
                        </a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- 主内容区 -->
        <main id="main-content" class="flex-1 transition-all duration-300 ease-in-out">
            @yield('content')
        </main>
    </div>

    <!-- JavaScript -->
    <script>
        // 侧边栏切换功能
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const menuText = document.getElementById('menu-text');
            const mainContent = document.getElementById('main-content');
            
            sidebar.classList.toggle('collapsed');
            
            // 调整主内容区的边距
            if (sidebar.classList.contains('collapsed')) {
                mainContent.style.marginLeft = '6rem';
            } else {
                mainContent.style.marginLeft = '16rem';
            }
        }

        // 页面加载完成后设置主内容区的初始边距
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            
            if (!sidebar.classList.contains('collapsed')) {
                mainContent.style.marginLeft = '16rem';
            } else {
                mainContent.style.marginLeft = '6rem';
            }
        });
    </script>
</body>
</html>
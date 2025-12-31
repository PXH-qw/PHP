<div class="fixed top-0 left-0 right-0 z-50 bg-gradient-to-r from-blue-600 to-indigo-700 text-white shadow-lg">
    <div class="container-fluid mx-auto px-4 py-3 flex justify-between items-center">
        <div>
            <h1 class="text-lg font-bold">@yield('title', '健身房管理系统')</h1>
        </div>
        
        <div class="flex items-center space-x-4">
            <span class="hidden md:inline">欢迎, {{ Auth::user()->name }}</span>
            <span class="md:hidden">{{ Auth::user()->name }}</span>
            
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm transition duration-200">
                    <i class="fas fa-sign-out-alt mr-1"></i>退出
                </button>
            </form>
        </div>
    </div>
</div>

<!-- 为页面内容预留页眉高度的空间 -->
<div class="pt-16">
    @yield('content')
</div>
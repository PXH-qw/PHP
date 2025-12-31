<aside class="bg-gray-800 text-white w-64 min-h-screen p-4">
    <h2 class="text-xl font-bold mb-6">健身房管理系统</h2>
    <ul class="space-y-2">
        <li>
            <a href="{{ route('home') }}" 
               class="block py-2 px-4 rounded hover:bg-gray-700 transition {{ request()->routeIs('home') ? 'bg-gray-700' : '' }}">
                首页
            </a>
        </li>
        @if(auth()->check())
            @if(auth()->user()->role === 'admin')
                <li>
                    <a href="{{ route('members.index') }}" 
                       class="block py-2 px-4 rounded hover:bg-gray-700 transition {{ request()->routeIs('members.*') ? 'bg-gray-700' : '' }}">
                        会员档案
                    </a>
                </li>
                <li>
                    <a href="{{ route('courses.index') }}" 
                       class="block py-2 px-4 rounded hover:bg-gray-700 transition {{ request()->routeIs('courses.*') ? 'bg-gray-700' : '' }}">
                        课程管理
                    </a>
                </li>
                <li>
                    <a href="{{ route('courses.index') }}" 
                       class="block py-2 px-4 rounded hover:bg-gray-700 transition {{ request()->routeIs('courses.*') ? 'bg-gray-700' : '' }}">
                        课程预约
                    </a>
                </li>
                <li>
                    <a href="{{ route('transactions.index') }}" 
                       class="block py-2 px-4 rounded hover:bg-gray-700 transition {{ request()->routeIs('transactions.*') ? 'bg-gray-700' : '' }}">
                        消费记录
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('members.show', auth()->user()->id) }}" 
                       class="block py-2 px-4 rounded hover:bg-gray-700 transition {{ request()->routeIs('members.show') ? 'bg-gray-700' : '' }}">
                        我的资料
                    </a>
                </li>
                <li>
                    <a href="{{ route('courses.index') }}" 
                       class="block py-2 px-4 rounded hover:bg-gray-700 transition {{ request()->routeIs('courses.*') ? 'bg-gray-700' : '' }}">
                        课程预约
                    </a>
                </li>
                <li>
                    <a href="{{ route('transactions.index') }}" 
                       class="block py-2 px-4 rounded hover:bg-gray-700 transition {{ request()->routeIs('transactions.*') ? 'bg-gray-700' : '' }}">
                        消费记录
                    </a>
                </li>
            @endif
        @endif
    </ul>
</aside>
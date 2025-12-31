@extends('layouts.app')

@section('title', '会员管理')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div class="card shadow-lg rounded-xl border-0">
                <div class="card-header bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-t-xl border-0">
                    @if(auth()->user()->isAdmin())
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold text-white">会员管理</h2>
                        <a href="{{ route('members.create') }}" class="bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-green-50 transition duration-200 font-medium shadow-md">
                            <i class="fas fa-plus mr-1"></i> 添加会员
                        </a>
                    </div>
                    @else
                    <h2 class="text-xl font-bold text-white">个人信息管理</h2>
                    @endif
                </div>
                
                <div class="card-body p-6">
                    @if(session('success'))
                        <div class="alert alert-success bg-green-100 text-green-700 p-3 rounded mb-4" id="success-alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger bg-red-100 text-red-700 p-3 rounded mb-4" id="error-alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- 搜索表单 -->
                    <form method="GET" action="{{ route('members.index') }}" class="mb-6">
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="flex-grow">
                                <input type="text" name="search" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                       placeholder="搜索会员..." value="{{ request('search') }}">
                            </div>
                            <div>
                                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200 font-medium">
                                    <i class="fas fa-search mr-1"></i>搜索
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 rounded-lg">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider rounded-tl-lg">
                                        姓名
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        邮箱
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        电话
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        会员类型
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        会员到期日期
                                    </th>
                                    @if(auth()->user()->isAdmin())
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider rounded-tr-lg">
                                        操作
                                    </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($members as $member)
                                <tr class="hover:bg-gray-50 transition duration-100">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $member->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $member->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $member->phone }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $member->member_type === '年卡会员' ? 'bg-green-100 text-green-800' : 
                                               ($member->member_type === '季卡会员' ? 'bg-blue-100 text-blue-800' : 
                                               ($member->member_type === '月卡会员' ? 'bg-purple-100 text-purple-800' : 'bg-yellow-100 text-yellow-800')) }}">
                                            {{ $member->member_type }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $member->membership_end_date ? \Carbon\Carbon::parse($member->membership_end_date)->format('Y-m-d') : 'N/A' }}
                                    </td>
                                    @if(auth()->user()->isAdmin())
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('members.show', $member->id) }}" class="text-blue-600 hover:text-blue-900 mr-3 transition duration-150">
                                            <i class="fas fa-eye"></i> 查看
                                        </a>
                                        <a href="{{ route('members.edit', $member->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3 transition duration-150">
                                            <i class="fas fa-edit"></i> 编辑
                                        </a>
                                        
                                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display: inline-block;" 
                                              onsubmit="return confirm('确定要删除这个会员吗？')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 transition duration-150">
                                                <i class="fas fa-trash"></i> 删除
                                            </button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="{{ auth()->user()->isAdmin() ? 6 : 5 }}" class="px-6 py-4 text-center text-gray-500">
                                        @if(auth()->user()->isAdmin())
                                            暂无会员数据
                                        @else
                                            暂无个人信息
                                        @endif
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- 分页信息 -->
                    <div class="d-flex justify-content-between align-items-center mt-6">
                        <div class="text-gray-600">
                            @if($members->total() > 0)
                                @if(auth()->user()->isAdmin())
                                    显示第 {{ $members->firstItem() }} 到第 {{ $members->lastItem() }} 条记录，共 {{ $members->total() }} 条记录
                                @else
                                    您的个人信息记录
                                @endif
                            @else
                                没有找到匹配的记录
                            @endif
                        </div>
                        <div>
                            {{ $members->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// 自动关闭成功提示
document.addEventListener('DOMContentLoaded', function() {
    const successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(function() {
            successAlert.style.display = 'none';
        }, 3000); // 3秒后自动隐藏
    }
    
    const errorAlert = document.getElementById('error-alert');
    if (errorAlert) {
        setTimeout(function() {
            errorAlert.style.display = 'none';
        }, 3000); // 3秒后自动隐藏
    }
});
</script>
@endsection
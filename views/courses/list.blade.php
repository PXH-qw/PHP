@extends('layouts.app')

@section('title', '课程管理')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div class="card shadow-lg rounded-xl border-0">
                <div class="card-header bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-t-xl border-0">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold text-white">课程管理</h2>
                        @if(auth()->user()->role === 'admin')
                        <a href="{{ route('courses.create') }}" class="bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-green-50 transition duration-200 font-medium shadow-md">
                            <i class="fas fa-plus mr-1"></i> 添加课程
                        </a>
                        @endif
                    </div>
                </div>
                
                <div class="card-body p-6">
                    @if(session('success'))
                        <div class="alert alert-success bg-green-100 text-green-700 p-3 rounded mb-4" id="success-alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 rounded-lg">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider rounded-tl-lg">
                                        课程名称
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        教练
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        时间
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        容量
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider rounded-tr-lg">
                                        操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($courses as $course)
                                <tr class="hover:bg-gray-50 transition duration-100">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $course->name }}</div>
                                        <div class="text-sm text-gray-500 mt-1">{{ Str::limit($course->description, 50) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $course->instructor }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $course->schedule->format('Y-m-d H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $course->current_participants }}/{{ $course->max_participants }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('courses.edit', $course->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3 transition duration-150">
                                            <i class="fas fa-edit"></i> 编辑
                                        </a>
                                        
                                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline-block;" 
                                              onsubmit="return confirm('确定要删除这个课程吗？')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 transition duration-150">
                                                <i class="fas fa-trash"></i> 删除
                                            </button>
                                        </form>
                                        @else
                                        <span class="text-gray-500">无权限</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        暂无课程数据
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- 分页信息 -->
                    <div class="d-flex justify-content-between align-items-center mt-6">
                        <div class="text-gray-600">
                            @if($courses->total() > 0)
                                显示第 {{ $courses->firstItem() }} 到第 {{ $courses->lastItem() }} 条记录，共 {{ $courses->total() }} 条记录
                            @else
                                没有找到匹配的记录
                            @endif
                        </div>
                        <div>
                            {{ $courses->appends(request()->query())->links() }}
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
});
</script>
@endsection
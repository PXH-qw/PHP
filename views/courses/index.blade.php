@extends('layouts.app')

@section('title', '课程预约')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div class="card shadow-lg rounded-xl border-0">
                <div class="card-header bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-t-xl border-0">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold text-white">课程预约</h2>
                    </div>
                </div>
                
                <div class="card-body p-6">
                    @if(session('success'))
                        <div class="alert alert-success bg-green-100 text-green-700 p-3 rounded mb-4" id="success-alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($courses as $course)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $course->name }}</h3>
                            <p class="text-sm text-gray-600 mt-2">{{ $course->description }}</p>
                            <div class="mt-4 text-sm">
                                <p><span class="font-medium">教练:</span> {{ $course->instructor }}</p>
                                <p><span class="font-medium">时间:</span> {{ $course->schedule->format('Y-m-d H:i') }}</p>
                                <p><span class="font-medium">容量:</span> {{ $course->current_participants }}/{{ $course->max_participants }}</p>
                            </div>
                            <div class="mt-4 flex space-x-2">
                                @if($course->current_participants < $course->max_participants)
                                    <form action="{{ route('courses.reserve', $course) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700">
                                            预约课程
                                        </button>
                                    </form>
                                @else
                                    <button class="bg-gray-400 text-white px-3 py-1 rounded text-sm" disabled>
                                        人数已满
                                    </button>
                                @endif
                            </div>
                        </div>
                        @empty
                        <div class="col-span-full text-center">
                            <p class="text-gray-500">暂无课程数据</p>
                        </div>
                        @endforelse
                    </div>
                    
                    <div class="d-flex justify-content-center mt-6">
                        {{ $courses->links() }}
                    </div>

                    <!-- 中文分页信息 -->
                    @if($courses->total() > 0)
                        <div class="text-center mt-4 text-gray-600">
                            显示第 {{ $courses->firstItem() }} 到第 {{ $courses->lastItem() }} 条记录，共 {{ $courses->total() }} 条记录
                        </div>
                    @endif
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
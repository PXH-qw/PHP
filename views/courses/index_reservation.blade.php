@extends('layouts.app')

@section('title', '课程预约')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-xl border-0">
                <div class="card-header bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-t-xl border-0">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold text-white">课程预约</h2>
                        @if(!auth()->user()->isAdmin())
                        <a href="{{ route('courses.my_reservations') }}" class="bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-green-50 transition duration-200 font-medium shadow-md">
                            <i class="fas fa-calendar-check mr-1"></i> 我的预约
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

                    @if(session('error'))
                        <div class="alert alert-danger bg-red-100 text-red-700 p-3 rounded mb-4" id="error-alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($courses as $course)
                        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200 transform transition duration-500 hover:scale-105 hover:shadow-lg">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800">{{ $course->name }}</h3>
                                    <p class="text-gray-600 mt-2">{{ $course->description }}</p>
                                </div>
                                
                                @if($course->reservations()->where('user_id', auth()->id())->exists())
                                    <form action="{{ route('courses.cancel_reservation', $course) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-100 text-red-600 px-3 py-1 rounded-lg hover:bg-red-200 transition duration-200 font-medium" 
                                                onclick="return confirm('确定要取消预约吗？')">
                                            取消预约
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('courses.reserve', $course) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="bg-blue-100 text-blue-600 px-3 py-1 rounded-lg hover:bg-blue-200 transition duration-200 font-medium" 
                                                @if($course->current_participants >= $course->max_participants) disabled @endif>
                                            @if($course->current_participants >= $course->max_participants)
                                                已约满
                                            @else
                                                预约
                                            @endif
                                        </button>
                                    </form>
                                @endif
                            </div>
                            
                            <div class="mt-4 flex flex-wrap justify-between text-sm text-gray-600">
                                <div>
                                    <i class="fas fa-chalkboard-teacher mr-1"></i>
                                    <span>{{ $course->instructor }}</span>
                                </div>
                                <div>
                                    <i class="fas fa-clock mr-1"></i>
                                    <span>{{ \Carbon\Carbon::parse($course->schedule)->format('m-d H:i') }}</span>
                                </div>
                                <div>
                                    <i class="fas fa-users mr-1"></i>
                                    <span>{{ $course->current_participants }}/{{ $course->max_participants }}</span>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-full text-center py-8">
                            <p class="text-gray-500 text-lg">暂无课程</p>
                        </div>
                        @endforelse
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
    
    const errorAlert = document.getElementById('error-alert');
    if (errorAlert) {
        setTimeout(function() {
            errorAlert.style.display = 'none';
        }, 3000); // 3秒后自动隐藏
    }
});
</script>
@endsection
@extends('layouts.app')

@section('title', '课程详情')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div class="card shadow-lg rounded-xl border-0">
                <div class="card-header bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-t-xl border-0">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold text-white">课程详情</h2>
                        <a href="{{ route('courses.index') }}" class="bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-green-50 transition duration-200 font-medium">
                            <i class="fas fa-arrow-left mr-1"></i> 返回列表
                        </a>
                    </div>
                </div>
                
                <div class="card-body p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">基本信息</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">课程名称</label>
                                    <p class="mt-1 text-lg font-medium text-gray-900">{{ $course->name }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">课程描述</label>
                                    <p class="mt-1 text-gray-900">{{ $course->description ?: '暂无描述' }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">教练</label>
                                    <p class="mt-1 text-gray-900">{{ $course->instructor }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">课程安排</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">课程时间</label>
                                    <p class="mt-1 text-gray-900">{{ $course->schedule->format('Y-m-d H:i') }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">最大参与人数</label>
                                    <p class="mt-1 text-gray-900">{{ $course->max_participants }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">当前参与人数</label>
                                    <p class="mt-1 text-gray-900">{{ $course->current_participants }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">预约状态</label>
                                    <p class="mt-1">
                                        @if($course->current_participants >= $course->max_participants)
                                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                人数已满
                                            </span>
                                        @else
                                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                可预约
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex space-x-3">
                        @if(auth()->user()->role === 'admin')
                        <a href="{{ route('courses.edit', $course->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-200 font-medium">
                            <i class="fas fa-edit mr-1"></i> 编辑
                        </a>
                        
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline-block;"
                              onsubmit="return confirm('确定要删除这个课程吗？')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-200 font-medium">
                                <i class="fas fa-trash mr-1"></i> 删除
                            </button>
                        </form>
                        @endif
                        
                        <a href="{{ route('courses.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-200 font-medium">
                            <i class="fas fa-arrow-left mr-1"></i> 返回列表
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', '编辑课程')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div class="card shadow-lg rounded-xl border-0">
                <div class="card-header bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-t-xl border-0">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold text-white">编辑课程</h2>
                        <a href="{{ route('courses.index') }}" class="bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-green-50 transition duration-200 font-medium">
                            <i class="fas fa-arrow-left mr-1"></i> 返回列表
                        </a>
                    </div>
                </div>
                
                <div class="card-body p-6">
                    <form method="POST" action="{{ route('courses.update', $course->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">基本信息</h3>
                                
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-600">课程名称</label>
                                        <input type="text" name="name" value="{{ old('name', $course->name) }}" class="mt-1 block w-full px-3 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                                        @error('name')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-600">课程描述</label>
                                        <textarea name="description" rows="3" class="mt-1 block w-full px-3 py-2 border @error('description') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">{{ old('description', $course->description) }}</textarea>
                                        @error('description')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-600">教练</label>
                                        <input type="text" name="instructor" value="{{ old('instructor', $course->instructor) }}" class="mt-1 block w-full px-3 py-2 border @error('instructor') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                                        @error('instructor')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">课程安排</h3>
                                
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-600">课程时间</label>
                                        <input type="datetime-local" name="schedule" value="{{ old('schedule', $course->schedule->format('Y-m-d\TH:i')) }}" class="mt-1 block w-full px-3 py-2 border @error('schedule') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                                        @error('schedule')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-600">最大参与人数</label>
                                        <input type="number" name="max_participants" value="{{ old('max_participants', $course->max_participants) }}" min="1" class="mt-1 block w-full px-3 py-2 border @error('max_participants') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                                        @error('max_participants')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 flex space-x-3">
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200 font-medium">
                                <i class="fas fa-save mr-1"></i> 更新
                            </button>
                            
                            <a href="{{ route('courses.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-200 font-medium">
                                <i class="fas fa-arrow-left mr-1"></i> 取消
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
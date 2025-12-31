@extends('layouts.app')

@section('title', '仪表板')

@section('content')
<div class="flex-1 flex items-center justify-center w-full min-h-[calc(100vh-4rem)]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- 会员档案卡片 -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                <div class="flex flex-col items-center">
                    <div class="bg-blue-100 p-4 rounded-full mb-4">
                        <i class="fas fa-users text-blue-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">会员档案</h3>
                    <p class="text-gray-600 text-center mb-4">管理会员信息，查看会员详细资料</p>
                    <a href="{{ route('members.index') }}" class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                        进入
                    </a>
                </div>
            </div>

            <!-- 课程管理卡片 -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                <div class="flex flex-col items-center">
                    <div class="bg-green-100 p-4 rounded-full mb-4">
                        <i class="fas fa-book text-green-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">课程管理</h3>
                    <p class="text-gray-600 text-center mb-4">管理课程信息，查看课程安排</p>
                    <a href="{{ route('courses.list') }}" class="w-full text-center bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                        进入
                    </a>
                </div>
            </div>

            <!-- 课程预约卡片 -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                <div class="flex flex-col items-center">
                    <div class="bg-purple-100 p-4 rounded-full mb-4">
                        <i class="fas fa-calendar-check text-purple-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">课程预约</h3>
                    <p class="text-gray-600 text-center mb-4">浏览可预约课程，进行课程预约</p>
                    <a href="{{ route('courses.index') }}" class="w-full text-center bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                        进入
                    </a>
                </div>
            </div>

            <!-- 消费记录卡片 -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                <div class="flex flex-col items-center">
                    <div class="bg-red-100 p-4 rounded-full mb-4">
                        <i class="fas fa-receipt text-red-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">消费记录</h3>
                    <p class="text-gray-600 text-center mb-4">查看消费记录，管理交易信息</p>
                    <a href="{{ route('transactions.index') }}" class="w-full text-center bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                        进入
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
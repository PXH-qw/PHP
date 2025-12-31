@extends('layouts.app')

@section('title', '个人信息')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-xl border-0">
                <div class="card-header bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-t-xl border-0">
                    <h2 class="text-xl font-bold text-white">个人信息</h2>
                </div>
                
                <div class="card-body p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">姓名</label>
                            <p class="text-gray-900">{{ $member->name }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">邮箱</label>
                            <p class="text-gray-900">{{ $member->email }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">电话</label>
                            <p class="text-gray-900">{{ $member->phone ?? '未填写' }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">会员类型</label>
                            <p class="text-gray-900">{{ $member->member_type ?? '普通会员' }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">会员开始日期</label>
                            <p class="text-gray-900">{{ $member->membership_start_date ? \Carbon\Carbon::parse($member->membership_start_date)->format('Y-m-d') : 'N/A' }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">会员到期日期</label>
                            <p class="text-gray-900">{{ $member->membership_end_date ? \Carbon\Carbon::parse($member->membership_end_date)->format('Y-m-d') : 'N/A' }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('members.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">返回个人信息</a>
                        
                        <a href="{{ route('members.edit', $member->id) }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-200 font-medium">
                            编辑信息
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
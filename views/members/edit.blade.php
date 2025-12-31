@extends('layouts.app')

@section('title', $member->name . ' - 编辑信息')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-xl border-0">
                <div class="card-header bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-t-xl border-0">
                    <h2 class="text-xl font-bold text-white">编辑 {{ $member->name }} 的信息</h2>
                </div>
                
                <div class="card-body p-6">
                    <form method="POST" action="{{ route('members.update', $member->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-2">姓名</label>
                            <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name', $member->name) }}" required>
                            @error('name')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-medium mb-2">邮箱</label>
                            <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('email', $member->email) }}" required>
                            @error('email')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700 font-medium mb-2">电话</label>
                            <input type="text" name="phone" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('phone', $member->phone) }}">
                            @error('phone')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="membership_start_date" class="block text-gray-700 font-medium mb-2">会员开始日期</label>
                            @if(auth()->user()->isAdmin())
                                <input type="date" name="membership_start_date" id="membership_start_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('membership_start_date', $member->membership_start_date) }}" required>
                            @else
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" value="{{ $member->membership_start_date ? \Carbon\Carbon::parse($member->membership_start_date)->format('Y-m-d') : 'N/A' }}" readonly>
                                <input type="hidden" name="membership_start_date" value="{{ $member->membership_start_date }}">
                            @endif
                            @error('membership_start_date')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="membership_end_date" class="block text-gray-700 font-medium mb-2">会员到期日期</label>
                            @if(auth()->user()->isAdmin())
                                <input type="date" name="membership_end_date" id="membership_end_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('membership_end_date', $member->membership_end_date) }}" required>
                            @else
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" value="{{ $member->membership_end_date ? \Carbon\Carbon::parse($member->membership_end_date)->format('Y-m-d') : 'N/A' }}" readonly>
                                <input type="hidden" name="membership_end_date" value="{{ $member->membership_end_date }}">
                            @endif
                            @error('membership_end_date')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="member_type" class="block text-gray-700 font-medium mb-2">会员类型</label>
                            @if(auth()->user()->isAdmin())
                                <select name="member_type" id="member_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                    <option value="年卡会员" {{ old('member_type', $member->member_type) === '年卡会员' ? 'selected' : '' }}>年卡会员</option>
                                    <option value="季卡会员" {{ old('member_type', $member->member_type) === '季卡会员' ? 'selected' : '' }}>季卡会员</option>
                                    <option value="月卡会员" {{ old('member_type', $member->member_type) === '月卡会员' ? 'selected' : '' }}>月卡会员</option>
                                    <option value="次卡会员" {{ old('member_type', $member->member_type) === '次卡会员' ? 'selected' : '' }}>次卡会员</option>
                                </select>
                            @else
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" value="{{ $member->member_type }}" readonly>
                                <input type="hidden" name="member_type" value="{{ $member->member_type }}">
                            @endif
                            @error('member_type')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        @if(auth()->user()->isAdmin())
                        <div class="mb-4">
                            <label for="user_id" class="block text-gray-700 font-medium mb-2">关联用户</label>
                            <select name="user_id" id="user_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">无关联用户</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id', $member->user_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif
                        
                        <div class="flex items-center justify-between">
                            <a href="{{ route('members.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">取消</a>
                            
                            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-200 font-medium">
                                更新信息
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
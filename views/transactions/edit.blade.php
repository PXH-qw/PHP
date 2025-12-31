@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-xl border-0">
                <div class="card-header bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-t-xl border-0">
                    <h2 class="text-xl font-bold text-white">编辑交易</h2>
                </div>
                
                <div class="card-body p-6">
                    <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="user_id" class="block text-gray-700 font-medium mb-2">用户</label>
                            <select name="user_id" id="user_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id', $transaction->user_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="member_id" class="block text-gray-700 font-medium mb-2">会员</label>
                            <select name="member_id" id="member_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}" {{ old('member_id', $transaction->member_id) == $member->id ? 'selected' : '' }}>
                                        {{ $member->name }} ({{ $member->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('member_id')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- 显示会员的开始和到期日期 -->
                        @if($transaction->member)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">会员开始日期</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" 
                                    value="{{ $transaction->member->membership_start_date ? \Carbon\Carbon::parse($transaction->member->membership_start_date)->format('Y-m-d') : 'N/A' }}" readonly>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">会员到期日期</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" 
                                    value="{{ $transaction->member->membership_end_date ? \Carbon\Carbon::parse($transaction->member->membership_end_date)->format('Y-m-d') : 'N/A' }}" readonly>
                            </div>
                        </div>
                        @endif
                        
                        <div class="mb-4">
                            <label for="type" class="block text-gray-700 font-medium mb-2">类型</label>
                            <input type="text" name="type" id="type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('type', $transaction->type) }}" required>
                            @error('type')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="amount" class="block text-gray-700 font-medium mb-2">金额</label>
                            <input type="number" name="amount" id="amount" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('amount', $transaction->amount) }}" step="0.01" min="0.01" required>
                            @error('amount')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-medium mb-2">描述</label>
                            <textarea name="description" id="description" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3">{{ old('description', $transaction->description) }}</textarea>
                            @error('description')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <a href="{{ route('transactions.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">取消</a>
                            
                            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-200 font-medium">
                                更新交易
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', $transaction->id . ' - 交易详情')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-xl border-0">
                <div class="card-header bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-t-xl border-0">
                    <h2 class="text-xl font-bold text-white">交易详情</h2>
                </div>
                
                <div class="card-body p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">ID</label>
                            <p class="text-gray-900">{{ $transaction->id }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">用户</label>
                            <p class="text-gray-900">{{ $transaction->user->name ?? 'N/A' }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">会员</label>
                            <p class="text-gray-900">{{ $transaction->member->name ?? 'N/A' }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">类型</label>
                            <p class="text-gray-900">{{ $transaction->type }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">金额</label>
                            <p class="text-gray-900">¥{{ number_format($transaction->amount, 2) }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">日期</label>
                            <p class="text-gray-900">{{ $transaction->created_at->format('Y-m-d H:i:s') }}</p>
                        </div>
                        
                        <!-- 显示会员的开始和到期日期，仅对管理员 -->
                        @if(auth()->user()->isAdmin() && $transaction->member)
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">会员开始日期</label>
                            <p class="text-gray-900">{{ $transaction->member->membership_start_date ? \Carbon\Carbon::parse($transaction->member->membership_start_date)->format('Y-m-d') : 'N/A' }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">会员到期日期</label>
                            <p class="text-gray-900">{{ $transaction->member->membership_end_date ? \Carbon\Carbon::parse($transaction->member->membership_end_date)->format('Y-m-d') : 'N/A' }}</p>
                        </div>
                        @endif
                        
                        <div class="mb-4 col-span-2">
                            <label class="block text-gray-700 font-medium mb-2">描述</label>
                            <p class="text-gray-900">{{ $transaction->description }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('transactions.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">返回交易列表</a>
                        
                        @if(auth()->user()->isAdmin())
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-200 font-medium">
                            编辑交易
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
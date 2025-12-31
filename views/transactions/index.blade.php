@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div class="card shadow-lg rounded-xl border-0">
                <div class="card-header bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-t-xl border-0">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold text-white">消费记录</h2>
                        @if(auth()->user()->role === 'admin')
                        <a href="{{ route('transactions.create') }}" class="bg-white text-purple-600 px-4 py-2 rounded-lg hover:bg-purple-50 transition duration-200 font-medium shadow-md">
                            <i class="fas fa-plus mr-1"></i> 添加记录
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
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        用户
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        会员
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        类型
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        金额
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        描述
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        日期
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider rounded-tr-lg">
                                        操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($transactions as $transaction)
                                <tr class="hover:bg-gray-50 transition duration-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $transaction->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $transaction->user->name ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $transaction->member->name ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $transaction->type }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        ¥{{ number_format($transaction->amount, 2) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate" title="{{ $transaction->description }}">
                                        {{ $transaction->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $transaction->created_at->format('Y-m-d H:i:s') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('transactions.show', $transaction->id) }}" class="text-blue-600 hover:text-blue-900 mr-3 transition duration-150">
                                            <i class="fas fa-eye"></i> 查看
                                        </a>
                                        
                                        @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3 transition duration-150">
                                            <i class="fas fa-edit"></i> 编辑
                                        </a>
                                        
                                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline-block;" 
                                              onsubmit="return confirm('确定要删除这条交易记录吗？')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 transition duration-150">
                                                <i class="fas fa-trash"></i> 删除
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                                        暂无消费记录
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- 分页信息 -->
                    <div class="d-flex justify-content-between align-items-center mt-6">
                        <div class="text-gray-600">
                            @if($transactions->total() > 0)
                                显示第 {{ $transactions->firstItem() }} 到第 {{ $transactions->lastItem() }} 条记录，共 {{ $transactions->total() }} 条记录
                            @else
                                没有找到匹配的记录
                            @endif
                        </div>
                        <div>
                            {{ $transactions->appends(request()->query())->links() }}
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
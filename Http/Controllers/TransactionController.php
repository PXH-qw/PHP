<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        if ($user->isAdmin()) {
            // 管理员可以查看所有交易记录
            $transactions = Transaction::with(['user', 'member'])->paginate(10);
        } else {
            // 普通会员只能查看自己的交易记录
            $transactions = Transaction::with(['user', 'member'])
                ->where('user_id', $user->id)
                ->paginate(10);
        }

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        
        // 获取所有用户和会员以供选择
        $users = User::all();
        $members = Member::all();
        
        return view('transactions.create', compact('users', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'member_id' => 'required|exists:members,id',
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string|max:500',
        ]);

        $transaction = Transaction::create($request->all());

        // 如果交易类型是续费或购买会员，更新会员的到期日期
        $this->updateMemberExpiryDate($transaction);

        return redirect()->route('transactions.index')
            ->with('success', '交易记录创建成功');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $user = Auth::user();
        
        // 检查用户是否有权限查看此交易记录
        if (!$user->isAdmin() && $transaction->user_id !== $user->id) {
            abort(403, 'Unauthorized');
        }
        
        // 获取关联的会员信息，包括开始和结束日期
        $transaction->load('member');
        
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        
        // 获取所有用户和会员以供选择
        $users = User::all();
        $members = Member::all();
        
        return view('transactions.edit', compact('transaction', 'users', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'member_id' => 'required|exists:members,id',
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string|max:500',
        ]);

        $transaction->update($request->all());

        // 如果交易类型是续费或购买会员，更新会员的到期日期
        $this->updateMemberExpiryDate($transaction);

        return redirect()->route('transactions.index')
            ->with('success', '交易记录更新成功');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $user = Auth::user();
        
        // 检查用户是否有权限删除此交易记录
        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        
        $transaction->delete();
        
        return redirect()->route('transactions.index')
            ->with('success', '交易记录已成功删除');
    }
    
    /**
     * 根据交易类型更新会员的到期日期
     */
    private function updateMemberExpiryDate($transaction)
    {
        // 如果交易类型包含"续费"或"会员"，则更新会员的到期日期
        if (strpos($transaction->type, '续费') !== false || strpos($transaction->type, '会员') !== false) {
            $member = $transaction->member;
            
            // 如果会员不存在，直接返回
            if (!$member) {
                return;
            }
            
            // 确定续费时长（这里可以按交易类型或金额来确定）
            $extensionMonths = $this->getMembershipExtensionMonths($transaction);
            
            // 如果当前会员到期日期已过期，则从今天开始续费；否则从当前到期日期开始续费
            $currentEndDate = $member->membership_end_date;
            $newEndDate = $currentEndDate && $currentEndDate->isFuture() 
                ? $currentEndDate->addMonths($extensionMonths) 
                : now()->addMonths($extensionMonths);
                
            // 更新会员的到期日期
            $member->update([
                'membership_end_date' => $newEndDate
            ]);
        }
    }
    
    /**
     * 根据交易类型或金额确定会员续费时长
     */
    private function getMembershipExtensionMonths($transaction)
    {
        // 这里可以根据交易类型或金额来确定续费时长
        // 例如：年卡续费12个月，季卡续费3个月，月卡续费1个月
        switch ($transaction->type) {
            case '年卡续费':
                return 12;
            case '季卡续费':
                return 3;
            case '月卡续费':
                return 1;
            default:
                // 可以根据交易金额来估算续费时长
                if ($transaction->amount >= 1000) {
                    return 12; // 假设1000以上为年卡
                } elseif ($transaction->amount >= 300) {
                    return 3; // 假设300-999为季卡
                } else {
                    return 1; // 其他为月卡
                }
        }
    }
}
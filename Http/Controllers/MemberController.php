<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        
        if ($user && $user->isAdmin()) {
            // 管理员可以查看所有会员
            $query = Member::query();
            
            // 检查搜索参数
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%");
                });
            }
            
            $members = $query->paginate(10);
            return view('members.index', compact('members'));
        } else {
            // 普通会员只能查看自己的会员信息
            $member = Member::where('user_id', $user->id)->first();
            
            // 如果用户没有关联的会员记录，检查是否已有相同邮箱的会员记录
            if (!$member) {
                $existingMember = Member::where('email', $user->email)->first();
                
                if ($existingMember) {
                    // 如果邮箱已存在，将现有会员记录关联到当前用户
                    $existingMember->update(['user_id' => $user->id]);
                    $member = $existingMember;
                } else {
                    // 如果邮箱不存在，创建新的会员记录
                    $member = Member::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'user_id' => $user->id,
                        'membership_start_date' => now(),
                        'membership_end_date' => now()->addYear(),
                        'member_type' => '普通会员'
                    ]);
                }
            }
            
            return view('members.profile', compact('member'));
        }
    }

    public function create()
    {
        $user = auth()->user();
        
        if (!$user || !$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        
        // 获取所有用户作为会员的关联用户
        $users = User::all();
        return view('members.create', compact('users'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        
        if (!$user || !$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'nullable|string|max:20',
            'membership_start_date' => 'required|date',
            'membership_end_date' => 'required|date|after:membership_start_date',
            'member_type' => 'required|string|max:255',
            'user_id' => 'nullable|exists:users,id',
        ]);

        Member::create($request->all());

        return redirect()->route('members.index')->with('success', '会员创建成功');
    }

    public function show($id)
    {
        $user = auth()->user();
        
        // 获取会员信息
        if ($user && $user->isAdmin()) {
            $member = Member::findOrFail($id);
        } else {
            // 普通会员只能查看自己的信息
            $member = Member::where('user_id', $user->id)->where('id', $id)->firstOrFail();
        }
        
        return view('members.show', compact('member'));
    }

    public function edit($id)
    {
        $user = auth()->user();
        
        if (!$user || !$user->isAdmin()) {
            // 普通用户只能编辑自己的信息
            $member = Member::where('user_id', $user->id)->where('id', $id)->firstOrFail();
            $users = User::all();
            return view('members.edit', compact('member', 'users'));
        }
        
        // 管理员可以编辑任何会员
        $member = Member::findOrFail($id);
        $users = User::all();
        return view('members.edit', compact('member', 'users'));
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();
        
        if (!$user || !$user->isAdmin()) {
            // 普通用户只能更新自己的信息
            $member = Member::where('user_id', $user->id)->where('id', $id)->firstOrFail();
        } else {
            // 管理员可以更新任何会员
            $member = Member::findOrFail($id);
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,'.$id,
            'phone' => 'nullable|string|max:20',
            'membership_start_date' => 'required|date',
            'membership_end_date' => 'required|date|after:membership_start_date',
            'member_type' => 'required|string|max:255',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')->with('success', '会员更新成功');
    }

    public function destroy($id)
    {
        $user = auth()->user();
        
        if (!$user || !$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')->with('success', '会员删除成功');
    }
}
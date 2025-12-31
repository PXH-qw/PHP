<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $user = auth()->user();
        
        if (!$user || !$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        
        $users = User::paginate(10);
        
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        $user = auth()->user();
        
        if (!$user || !$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        
        if (!$user || !$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,customer',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', '用户创建成功');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $authUser = auth()->user();
        
        if (!$authUser || !$authUser->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        
        $user = User::findOrFail($id);
        
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        $authUser = auth()->user();
        
        if (!$authUser || !$authUser->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'role' => 'required|in:admin,customer',
        ]);

        // 只有在提供了新密码时才更新密码
        $data = $request->only(['name', 'email', 'role']);
        
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8|confirmed',
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', '用户更新成功');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $authUser = auth()->user();
        
        if (!$authUser || !$authUser->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        
        // 不能删除自己
        if ($authUser->id == $id) {
            return redirect()->route('users.index')->with('error', '不能删除自己的账户');
        }
        
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', '用户删除成功');
    }
}
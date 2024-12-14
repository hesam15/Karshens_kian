<?php

namespace App\Http\Controllers;

use App\Models\Permisions;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user){
        $permisions = Permisions::all();
        $roles = Role::all();
        $user->load('roles', 'permisions');

        return view('admin.users.edit', compact('user', 'roles', 'permisions'));
    }

    public function update(Request $request, User $user){
        $user->roles()->sync($request->roles);
        $user->permisions()->sync($request->permisions);

        return redirect()->route('users.index');
    }
}

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

//Create
    public function create(){
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

//Update
    public function edit(User $user){
        $roles = Role::all();
        $user->load('roles');

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user){
        $user->refreshRoles($request->role);
        $user->name = $request->name;

        return redirect()->route('users.index');
    }

//Asign Role
    public function assignRole(Request $request, User $user){
        $user->assignRole($request->role);

        return back()->with('success', true);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Token;
use App\Models\Permisions;
use Illuminate\Http\Request;
use App\Services\Notification;
use Illuminate\Contracts\Session\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

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
    public function store(Request $request){
        $user = User::create($request->only('name', 'email', 'password'));

        $user->assignRole($request->role);

        return redirect()->route('users.index')->with("success", "کاربر جدید با موفقیت ایجاد شد.");
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

        return redirect()->route('users.index')->with("success", "کاربر با موفقیت ویرایش شد.");
    }
//Delete
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index');
    }

//Asign Role
    // public function addRole(Request $request, User $user){
    //     $user->assignRole($request->role);

    //     return back()->with('success', true);
    // }
}

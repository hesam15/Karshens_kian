<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permisions;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function storePage(){
        $permissions = Permisions::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request){
        $this->validateForm($request);

        Role::create($request->only(['name', 'persian_name']));

        return redirect()->route('roles.index')->with('success', true);
    }

    public function edit(Role $role){
        $permissions = Permisions::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role){
        $this->validateForm($request);

        $role->update($request->only(['name', 'persian_name']));

        $role->refreshPermisions($request->permissions);

        return redirect()->route('roles.index')->with('success', true);
    }

    public function validateForm(Request $request){
        $request->validate([
            'name' => 'required|unique:roles,name',
            'persian_name' => 'required|unique:roles,persian_name'
        ]);
    }
}

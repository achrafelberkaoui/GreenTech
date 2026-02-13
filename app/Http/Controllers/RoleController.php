<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny',Role::class);
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $this->authorize('create',Role::class);
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->authorize('create',Role::class);
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);
        // dd($request->permissions);
        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        $this->authorize('update',Role::class);
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $this->authorize('update',Role::class);
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $role->update([
            'name' => $request->name
        ]);
        $role->permissions()->toggle($request->permissions);

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
    $this->authorize('delete',Role::class);
        $role->delete();
        return redirect()->route('roles.index');
    }
}
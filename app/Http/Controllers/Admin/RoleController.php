<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permission', ['only' => ['index']]);
        $this->middleware('permission:add_permission', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_permission', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_permission', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::select('id', 'name')->get();

        return view('Admin.Role.index_role', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::select('id', 'name', 'alias')
            ->where('parent_id', 0)
            ->with('children:id,name,alias,parent_id')
            ->orderBy('id', 'ASC')
            ->get();
        // return $permissions;
        return view('Admin.Role.new_role', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->role;
        $role->save();
        $role->syncPermissions($request->permissions);

        return redirect(route('role.index'))->with('success', 'تم إضافة الصلاحية بنجاح');
    }

    public function edit($id)
    {
        $role = Role::with('permissions:id,name')->where('id', $id)->first();
        $permissions = Permission::select('id', 'name', 'alias')
            ->where('parent_id', 0)
            ->with('children:id,name,alias,parent_id')
            ->orderBy('id', 'ASC')
            ->get();

        return view('Admin.Role.edit_role', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $role->name = $request->role;
        $role->save();
        $role->syncPermissions($request->permissions);

        return redirect(route('role.index'))->with('success', 'تم تعديل الصلاحية بنجاح');
    }
}

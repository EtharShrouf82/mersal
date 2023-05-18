<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::select('id', 'name')->latest()->get();

        return view('Admin.permission.index_permission', compact('permissions'));
    }

    public function store(Request $request)
    {
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();

        return redirect(route('permission.index'))->with('success', 'تم إضافة الصلاحية بنجاح');
    }
}

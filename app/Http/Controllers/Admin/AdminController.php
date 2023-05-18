<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin', ['only' => ['index']]);
        $this->middleware('permission:add_admin', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_admin', ['only' => ['edit', 'update', 'updateStatus']]);
        $this->middleware('permission:delete_admin', ['only' => ['destroy']]);
    }

    public function index()
    {
        $admins = User::where('is_admin', 1)->orderBy('id', 'DESC')->paginate(20);

        return view('Admin.users.index', compact('admins'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {

    }

    public function create()
    {
        $roles = Role::select('id', 'name')->get();

        return view('Admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $admin = new User();
        $admin->name = $request->name;
        $admin->password = bcrypt($request->input('password'));
        $admin->status = 1;
        $admin->email = $request->email;
        $admin->role_name = $request->role_name;
        $admin->save();
        $admin->assignRole($request->input('role_name'));

        return redirect(route('admin.index'))->with('success', 'تم  إضافة الإداري بنجاح');
    }

    public function edit($id)
    {
        $roles = Role::select('id', 'name')->get();
        $admin = User::findOrFail($id);

        return view('Admin.users.edit', compact('admin', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->status = $request->status;
        $user->email = $request->email;
        $user->password = Hash::make(trim($request->input('password')));
        $user->save();

        return redirect(route('admin.index'))->with('success', 'تم تعديل المعلومات بنجاح');

    }

    public function updateStatus(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['message' => 'تم تعديل الحالة بنجاح.']);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            return 1;
        }
    }
}

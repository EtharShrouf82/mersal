<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Admin.login');
    }

    public function login(LoginRequest $request)
    {
        if (auth()->guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
        ])) {
            User::where('email', $request->email)
                ->update(['last_login_at' => now(), 'last_login_ip' => $request->getClientIp()]);

            return 1;
        }
        //        return redirect()->back()->with('Error','الرجاء التأكد من البيانات المدخلة')->withInput($request->all());
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('admin.login'));
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logut');
    }

    public function index()
    {
        return view('back-end.auth.login');
    }

    public function login(Request $request)
    {
        // Validasi Login
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        // Kondisi ketika login
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            // Kondisi ketika login success
            return redirect()->intended(route('dashboard.index'));
        } else {
            // Kondisi ketika login failed
            return redirect()->back()->with('status', 'Sepertinya ada yang salah dengan email atau password kamu');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.index');
    }
}

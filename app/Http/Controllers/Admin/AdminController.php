<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;


class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginPost(Request $request)
    {
        // dd($request->all());
        $credentials = $request->only('email', 'password');
        $credentials['password'] = $request->password;
        //  dd( $credentials);
        if (Auth::guard('admin')->attempt($credentials)) {
            // dd('hi');
            $notification1 = array(
                'message' => 'Admin Login Successful',
                'alert-type' => 'success'
            );
            return redirect()->route('admin-dashboard')->with($notification1);
        } else {
            $notification2 = array(
                'message' => 'Invalid Credentials',
                'alert-type' => 'error'
            );
            return back()->with($notification2);
        }
    }

    public function dashboard()
    {
        return view('admin.index');
    }

    public function adminLogout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'Admin Logout Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin-login')->with($notification);
    }

    public function adminProfile()
    {
        $admin = Admin::first();
        return view('admin.profile', compact('admin'));
    }
}

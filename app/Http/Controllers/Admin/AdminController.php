<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Image;


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

    public function adminProfileUpdate(Request $request)
    {
        // dd($request->all());

        $admin = Admin::first();
        // dd($admin);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;



        if ($request->file('image')) {
            $image = $request->file('image');
            @unlink(public_path('storage/admin/' . $admin->image));
            $filename = 'admin' . time() . '.' . $image->getClientOriginalExtension();

            // installing image intervention
            // composer require intervention/image

            // config/app.php
            // Intervention\Image\ImageServiceProvider::class,
            // 'Image' => Intervention\Image\Facades\Image::class,

            // php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravelRecent"


            Image::make($image)->resize(256, 256)->save('storage/admin/' . $filename);
            $filePath = 'storage/admin/' . $filename;
            $admin->image = $filename;
        }
        $admin->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function changePassword()
    {

        return view('admin.change_password');

    }
}

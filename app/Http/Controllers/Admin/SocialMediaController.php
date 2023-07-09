<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function create()
    {
        return view('admin.socialmedia.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
            'youtube' => 'required',
            'github' => 'required',


        ], [
            'facebook.required' => 'Facebook URL is Required',
            'twitter.required' => 'Twitter URL is Required',
            'instagram.required' => 'Instagram URL is Required',
            'linkedin.required' => 'LinkedIn URL is Required',
            'youtube.required' => 'YouTube URL is Required',
            'github.required' => 'GitHub URL is Required',
        ]);

        SocialMedia::insert([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
            'github' => $request->github,
        ]);

        $notification = array(
            'message' => 'Social Media Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('social-media')->with($notification);
    }

    public function index()
    {
        $data = SocialMedia::find(1);
        return view('admin.socialmedia.index', compact('data'));
    }


}

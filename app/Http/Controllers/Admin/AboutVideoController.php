<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutVideo;
use Image;
use Illuminate\Support\Carbon;

class AboutVideoController extends Controller
{
    public function create()
    {
        return view('admin.aboutvideo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required',
            'image' => 'required',
        ], [

            'video.required' => 'About Video is Required',
            'image.required' => 'About Image is Required',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

        Image::make($image)->resize(1049, 700)->save('storage/aboutvideo/' . $name_gen);
        $save_url = 'storage/aboutvideo/' . $name_gen;

        AboutVideo::insert([
            'video' => $request->video,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'About Video Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('about-video')->with($notification);
    }

    public function index()
    {
        $data = AboutVideo::find(1);
        return view('admin.aboutvideo.index', compact('data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'video' => 'required',
            ],
            [
                'video.required' => 'About Video is Required',
            ]
        );
        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {
            unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

            Image::make($image)->resize(1049, 700)->save('storage/aboutvideo/' . $name_gen);
            $save_url = 'storage/aboutvideo/' . $name_gen;

            AboutVideo::findOrFail($id)->update([
                'video' => $request->video,
                'image' => $save_url,
            ]);
            $notification = array(
                'message' => 'About Video Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('about-video')->with($notification);

        } else {

            AboutVideo::findOrFail($id)->update([
                'video' => $request->video,
            ]);
            $notification = array(
                'message' => 'About Video Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('about-video')->with($notification);

        }

    }
}

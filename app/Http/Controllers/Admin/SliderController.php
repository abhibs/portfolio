<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;
use Illuminate\Support\Carbon;



class SliderController extends Controller
{
    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'url' => 'required',
            'status' => 'required',
        ], [

            'name.required' => 'Slider Name is Required',
            'image.required' => 'Slider Image is Required',
            'url.required' => 'Slider URL is Required',
            'status.required' => 'Slider Status is Required',

        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

        Image::make($image)->resize(1050, 700)->save('storage/slider/' . $name_gen);
        $save_url = 'storage/slider/' . $name_gen;

        Slider::insert([
            'name' => $request->name,
            'image' => $save_url,
            'url' => $request->url,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('slider')->with($notification);

    }

    public function index()
    {
        $datas = Slider::latest()->get();
        return view('admin.slider.index', compact('datas'));
    }

    public function edit($id)
    {
        $data = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('data'));
    }


}

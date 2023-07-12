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

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'url' => 'required',
        ], [

            'name.required' => 'Slider Name is Required',
            'url.required' => 'Slider URL is Required',

        ]);
        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {
            unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

            Image::make($image)->resize(1050, 700)->save('storage/slider/' . $name_gen);
            $save_url = 'storage/slider/' . $name_gen;

            Slider::findOrFail($id)->update([
                'name' => $request->name,
                'image' => $save_url,
                'url' => $request->url,

            ]);
            $notification = array(
                'message' => 'Slider Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('slider')->with($notification);

        } else {

            Slider::findOrFail($id)->update([
                'name' => $request->name,
                'url' => $request->url,
            ]);
            $notification = array(
                'message' => 'Slider Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('slider')->with($notification);

        }

    }


    public function delete($id){

        $data = Slider::findOrFail($id);
        $img = $data->image;
        unlink($img);

        Slider::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Slider Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }

     public function inactive($id)
    {
        Slider::findOrFail($id)->update(['status' => 0]);
        // dd($data);
        $notification = array(
            'message' => 'Slider Image Inacative Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        Slider::findOrFail($id)->update(['status' => 1]);
        // dd($data);
        $notification = array(
            'message' => 'Slider Image Acative Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}

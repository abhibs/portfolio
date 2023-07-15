<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experiance;
use Image;
use Illuminate\Support\Carbon;

class ExperianceController extends Controller
{
    public function create()
    {
        return view('admin.experiance.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'image' => 'required',
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

        Image::make($image)->resize(1050, 700)->save('storage/experiance/' . $name_gen);
        $save_url = 'storage/experiance/' . $name_gen;

        Experiance::insert([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'image' => $save_url,
            'content' => $request->content,
            'rating' => $request->rating,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Project Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('experiance')->with($notification);

    }

    public function index()
    {
        $datas = Experiance::latest()->get();
        return view('admin.experiance.index', compact('datas'));
    }

    public function edit($id)
    {
        $data = Experiance::findOrFail($id);
        return view('admin.experiance.edit', compact('data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {
            unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

            Image::make($image)->resize(1050, 700)->save('storage/experiance/' . $name_gen);
            $save_url = 'storage/experiance/' . $name_gen;

            Experiance::findOrFail($id)->update([
                'name' => $request->name,
                'company_name' => $request->company_name,
                'image' => $save_url,
                'content' => $request->content,
                'rating' => $request->rating,
            ]);
            $notification = array(
                'message' => 'Experiance Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('experiance')->with($notification);

        } else {

            Experiance::findOrFail($id)->update([
                'name' => $request->name,
                'company_name' => $request->company_name,
                'content' => $request->content,
                'rating' => $request->rating,
            ]);
            $notification = array(
                'message' => 'Experiance Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('experiance')->with($notification);

        }

    }

    public function delete($id)
    {

        $data = Experiance::findOrFail($id);
        $img = $data->image;
        unlink($img);

        Experiance::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Experiance Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function inactive($id)
    {
        Experiance::findOrFail($id)->update(['status' => 0]);
        // dd($data);
        $notification = array(
            'message' => 'Experiance Inacative Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        Experiance::findOrFail($id)->update(['status' => 1]);
        // dd($data);
        $notification = array(
            'message' => 'Experiance Acative Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}

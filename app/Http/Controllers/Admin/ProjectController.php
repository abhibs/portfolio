<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Image;
use Illuminate\Support\Carbon;

class ProjectController extends Controller
{
    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'url' => 'required',
            'date' => 'required',
            'status' => 'required',
        ], [

            'name.required' => 'Project Name is Required',
            'image.required' => 'Project Image is Required',
            'url.required' => 'Project URL is Required',
            'date.required' => 'Project Date is Required',
            'status.required' => 'Project Status is Required',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

        Image::make($image)->resize(1024, 768)->save('storage/project/' . $name_gen);
        $save_url = 'storage/project/' . $name_gen;

        Project::insert([
            'name' => $request->name,
            'image' => $save_url,
            'url' => $request->url,
            'date' => $request->date,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Project Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('project')->with($notification);

    }

    public function index()
    {
        $datas = Project::latest()->get();
        return view('admin.project.index', compact('datas'));
    }

    public function edit($id)
    {
        $data = Project::findOrFail($id);
        return view('admin.project.edit', compact('data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'date' => 'required',

        ], [

            'name.required' => 'Project Name is Required',
            'url.required' => 'Project URL is Required',
            'date.required' => 'Project Date is Required',

        ]);
        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {
            unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

            Image::make($image)->resize(1024, 768)->save('storage/project/' . $name_gen);
            $save_url = 'storage/project/' . $name_gen;

            Project::findOrFail($id)->update([
                'name' => $request->name,
                'image' => $save_url,
                'url' => $request->url,
                'date' => $request->date,
            ]);
            $notification = array(
                'message' => 'Project Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('project')->with($notification);

        } else {

            Project::findOrFail($id)->update([
                'name' => $request->name,
                'url' => $request->url,
                'date' => $request->date,
            ]);
            $notification = array(
                'message' => 'Project Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('project')->with($notification);

        }

    }


    public function delete($id)
    {

        $data = Project::findOrFail($id);
        $img = $data->image;
        unlink($img);

        Project::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Project Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function inactive($id)
    {
        Project::findOrFail($id)->update(['status' => 0]);
        // dd($data);
        $notification = array(
            'message' => 'Project Inacative Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        Project::findOrFail($id)->update(['status' => 1]);
        // dd($data);
        $notification = array(
            'message' => 'Project Acative Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}

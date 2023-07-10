<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NameContent;



class NameContentController extends Controller
{
    public function create()
    {
        return view('admin.namecontent.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ], [
            'name.required' => 'Name is Required',
            'content.required' => 'Content is Required',
        ]);

        NameContent::insert([
            'name' => $request->name,
            'content' => $request->content,
        ]);

        $notification = array(
            'message' => 'Name and Content Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('name-content')->with($notification);
    }

    public function index()
    {
        $data = NameContent::find(1);
        return view('admin.namecontent.index', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ], [
            'name.required' => 'Name is Required',
            'content.required' => 'Content is Required',
        ]);
        $id = $request->id;

        NameContent::findOrFail($id)->update([
            'name' => $request->name,
            'content' => $request->content,
        ]);

        $notification = array(
            'message' => 'Name and Content Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('name-content')->with($notification);

    }
}

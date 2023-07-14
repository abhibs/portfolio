<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\MultiProgram;
use Image;
class ProgramController extends Controller
{
    public function create()
    {
        return view('admin.program.create');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image' => 'required',
        ]);

        $program = new Program;
        if ($request->file('image')) {
            $image = $request->file('image');
            $filename =  hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1049, 700)->save('storage/program/' . $filename);
            $filePath = 'storage/program/' . $filename;
            $program->image = $filename;
        }

        $program->save();

        foreach ($request->name as $key => $name) {
            $name = new MultiProgram;
            $name->program_id = $program->id;
            $name->name = $request->name[$key];
            $name->number = $request->number[$key];
            $name->save();
        }
        $notification = array(
            'message' => 'Program Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}

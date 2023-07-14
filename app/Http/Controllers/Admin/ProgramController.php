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
            'message' => 'Program Know Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function index()
    {
        $program = Program::find(2);
        $multiprogram = MultiProgram::where('program_id', $program->id)->get();
        return view('admin.program.index', compact('program', 'multiprogram'));
    }

    public function update(Request $request, $id)
    {
        $program = Program::find($id);
        if ($request->file('image')) {
            $image = $request->file('image');
            @unlink(public_path('storage/program/' . $program->image));
            $filename =  hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1049, 700)->save('storage/program/' . $filename);
            $filePath = 'storage/program/' . $filename;
            $program->image = $filename;
        }

        $program->save();

        if ($request->name) {
            $timelines = MultiProgram::where('program_id', $program->id)->get();
            foreach ($timelines as $timeline) {

                $timeline->delete();
            }
            foreach ($request->name as $key => $name) {

                $name = new MultiProgram();
                $name->program_id = $program->id;
                $name->name = $request->name[$key];
                $name->number = $request->number[$key];
                $name->save();
            }

        }
        $notification = array(
            'message' => 'Proram Know Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('program-know')->with($notification);
    }
}

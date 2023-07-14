<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resume;

class ResumeController extends Controller
{
    public function create()
    {
        return view('admin.resume.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf',
        ]);

        $resume = new Resume;

        if ($request->hasfile('resume')) {
            $file = $request->file('resume');
            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $filePath = 'storage/resume/' . $filename;
            $file->move(public_path('storage/resume'), $filePath);
            //dd($filename);
            $resume->resume = $filename;
        }
        $resume->save();
        $notification = array(
            'message' => 'Resumes Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('resume')->with($notification);
    }

    public function index()
    {
        $data = Resume::find(1);
        return view('admin.resume.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf',
        ]);

        $resume = Resume::find($id);


        if ($request->hasfile('resume')) {
            $file = $request->file('resume');
            $filename =  hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $filePath = 'storage/resume/' . $filename;
            //delete previous image
            @unlink(public_path('storage/resume/' . $resume->resume));
            $file->move(public_path('storage/resume'), $filePath);
            //dd($filename);
            $resume->resume = $filename;
        }
        $resume->save();
        $notification = array(
            'message' => 'Resumes Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('resume')->with($notification);
    }


}

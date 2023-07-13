<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Carbon;

class SkillController extends Controller
{
    public function create()
    {
        return view('admin.skill.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'icon' => 'required',
            'name' => 'required',
            'content' => 'required',
            'status' => 'required',
        ], [

            'icon.required' => 'Skill Icon is Required',
            'name.required' => 'Skill Name is Required',
            'content.required' => 'Skill Content is Required',
            'status.required' => 'Skill Status is Required',

        ]);


        Skill::insert([
            'icon' => $request->icon,
            'name' => $request->name,
            'content' => $request->content,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Skill Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('skill')->with($notification);

    }

    public function index()
    {
        $datas = Skill::latest()->get();
        return view('admin.skill.index', compact('datas'));
    }
}

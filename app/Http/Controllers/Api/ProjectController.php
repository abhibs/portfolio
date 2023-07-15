<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;


class ProjectController extends Controller
{
    public function projects()
    {
        $projects = Project::where('status', 1)->get();
        foreach ($projects as $data) {
            $data->image = asset("$data->image");
        }
        return response([
            'message' => 'Projects',
            'status' => 'success',
            'projects' => $projects,
            'code' => 200
        ], 200);
    }
}

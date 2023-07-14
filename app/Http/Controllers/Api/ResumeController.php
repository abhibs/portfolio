<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resume;

class ResumeController extends Controller
{
    public function resume()
    {
        $resume = Resume::find(1);
        $resume->resume = asset("/storage/resume/$resume->resume");

        return response([
            'message' => 'Resume',
            'status' => 'success',
            'resume' => $resume,
            'code' => 200
        ], 200);
    }
}

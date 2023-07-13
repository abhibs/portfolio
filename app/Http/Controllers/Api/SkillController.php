<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function skill()
    {
        $skill = Skill::where('status',1)->get();
        return response([
            'message' => 'Skill',
            'status' => 'success',
            'skill' => $skill,
            'code' => 200
        ], 200);
    }
}

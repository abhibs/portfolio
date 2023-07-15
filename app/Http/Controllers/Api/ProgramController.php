<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\MultiProgram;


class ProgramController extends Controller
{
    public function program()
    {
        $program = Program::find(1);
        $program->image = asset("/storage/program/$program->image");
        $multiprogram = MultiProgram::where('program_id', $program->id)->get();

        return response([
            'message' => 'Program',
            'status' => 'success',
            'program' => $program,
            'multiprogram' => $multiprogram,
            'code' => 200
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experiance;

class ExperiaceController extends Controller
{
    public function experiance(){
        $experiances = Experiance::where('status',1)->get();
        foreach ($experiances as $data) {
            $data->image =  asset("$data->image");
        }
        return response([
            'message' => 'Experiance',
            'status' => 'success',
            'experiances' => $experiances,
            'code' => 200
        ], 200);
    }
}

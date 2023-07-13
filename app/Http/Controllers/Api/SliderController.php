<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function slider(){
        $sliders = Slider::where('status',1)->get();
        foreach ($sliders as $data) {
            $data->image =  asset("$data->image");
        }
        return response([
            'message' => 'Sliders',
            'status' => 'success',
            'sliders' => $sliders,
            'code' => 200
        ], 200);
    }
}

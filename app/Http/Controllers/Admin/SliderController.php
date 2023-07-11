<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;


class SliderController extends Controller
{
    public function create()
    {
        return view('admin.slider.create');
    }

    public function index()
    {
        $datas = Slider::latest()->get();
        return view('admin.slider.index', compact('datas'));
    }
}

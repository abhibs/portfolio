<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
use App\Models\NameContent;
use App\Models\Slider;
use App\Models\Skill;



class HomeController extends Controller
{
    public function index(){
        $socialmedia = SocialMedia::find(1);
        $namecontent = NameContent::find(1);
        $sliders = Slider::where('status',1)->get();
        $skills = Skill::where('status',1)->limit(4)->get();

        return view('welcome',compact('socialmedia', 'namecontent', 'sliders', 'skills'));
    }
}

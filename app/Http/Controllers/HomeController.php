<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
use App\Models\NameContent;
use App\Models\Slider;
use App\Models\Skill;
use App\Models\AboutVideo;
use App\Models\Resume;
use App\Models\Program;
use App\Models\Project;

class HomeController extends Controller
{
    public function index(){
        $socialmedia = SocialMedia::find(1);
        $namecontent = NameContent::find(1);
        $sliders = Slider::where('status',1)->get();
        $skills = Skill::where('status',1)->get();
        $aboutvideo = AboutVideo::find(1);
        $resume = Resume::find(1);
        $program = Program::find(2);
        $projects = Project::where('status',1)->get();

        return view('welcome',compact('socialmedia', 'namecontent', 'sliders', 'skills', 'aboutvideo', 'resume', 'program', 'projects'));
    }
}

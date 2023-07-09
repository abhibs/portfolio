<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;


class HomeController extends Controller
{
    public function index(){
        $socialmedia = SocialMedia::find(1);
        return view('welcome',compact('socialmedia'));
    }
}

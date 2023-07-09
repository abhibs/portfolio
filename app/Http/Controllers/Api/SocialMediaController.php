<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;


class SocialMediaController extends Controller
{
    public function socialMedia(){
        $socialmedia = SocialMedia::find(1);
        return response([
            'message' => 'Social Media',
            'status' => 'success',
            'socialmedia' => $socialmedia,
            'code' => 200
        ], 200);
    }
}

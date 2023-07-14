<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutVideo;

class AboutVideoController extends Controller
{
    public function aboutVideo()
    {
        $aboutvideo = AboutVideo::find(1);
        $aboutvideo->image = asset("$aboutvideo->image");

        return response([
            'message' => 'About Video',
            'status' => 'success',
            'aboutvideo' => $aboutvideo,
            'code' => 200
        ], 200);
    }
}

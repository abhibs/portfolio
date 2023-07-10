<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NameContent;

class NameContentController extends Controller
{
    public function nameContent(){
        $namecontent = NameContent::find(1);
        return response([
            'message' => 'Name and Content',
            'status' => 'success',
            'namecontent' => $namecontent,
            'code' => 200
        ], 200);
    }
}

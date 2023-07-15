<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SocialMediaController;
use App\Http\Controllers\Api\NameContentController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\AboutVideoController;
use App\Http\Controllers\Api\ResumeController;
use App\Http\Controllers\Api\ProgramController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ExperiaceController;
use App\Http\Controllers\Api\EnquiryController;









/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/testing', function () {
    echo "Abhiram";
});

Route::get('social/media', [SocialMediaController::class, 'socialMedia']);
Route::get('name/content', [NameContentController::class, 'nameContent']);
Route::get('slider', [SliderController::class, 'slider']);
Route::get('skill', [SkillController::class, 'skill']);
Route::get('about/video', [AboutVideoController::class, 'aboutVideo']);
Route::get('resume', [ResumeController::class, 'resume']);
Route::get('program/know', [ProgramController::class, 'program']);
Route::get('project', [ProjectController::class, 'projects']);
Route::post('contact', [ContactController::class, 'contact']);
Route::get('experiance', [ExperiaceController::class, 'experiance']);
Route::post('enquiry', [EnquiryController::class, 'enquiry']);










Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

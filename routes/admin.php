<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\NameContentController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\AboutVideoController;
use App\Http\Controllers\Admin\ResumeController;
use App\Http\Controllers\Admin\ProgramController;


Route::get('/test', function () {
    echo "Abhiram";
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin-login');
    Route::post('/login', [AdminController::class, 'loginPost'])->name('admin-login-post');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
        Route::get('/logout', [Admincontroller::class, 'adminLogout'])->name('admin-logout');
        Route::get('/profile', [Admincontroller::class, 'adminProfile'])->name('admin-profile');
        Route::post('/profile/update', [AdminController::class, 'adminProfileUpdate'])->name('admin-profile-update');
        Route::get('/change/password', [Admincontroller::class, 'changePassword'])->name('admin-change-password');
        Route::post('/update/password', [AdminController::class, 'updatePassword'])->name('admin-password-update');


        Route::get('/social/media/create', [SocialMediaController::class, 'create'])->name('social-media-create');
        Route::post('/social/media/store', [SocialMediaController::class, 'store'])->name('social-media-store');
        Route::get('/social/media', [SocialMediaController::class, 'index'])->name('social-media');
        Route::post('/social/media/update', [SocialMediaController::class, 'update'])->name('social-media-update');

        Route::get('/name/content/create', [NameContentController::class, 'create'])->name('name-content-create');
        Route::post('/name/content/store', [NameContentController::class, 'store'])->name('name-content-store');
        Route::get('/name/content', [NameContentController::class, 'index'])->name('name-content');
        Route::post('/name/content/update', [NameContentController::class, 'update'])->name('name-content-update');


        Route::get('/slider/create', [SliderController::class, 'create'])->name('slider-create');
        Route::post('/slider/store', [SliderController::class, 'store'])->name('slider-store');
        Route::get('/slider', [SliderController::class, 'index'])->name('slider');
        Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider-edit');
        Route::post('/slider/update', [SliderController::class, 'update'])->name('slider-update');
        Route::get('/slider/delete/{id}', [SliderController::class, 'delete'])->name('slider-delete');
        Route::get('/slider/inactive/{id}', [SliderController::class, 'inactive'])->name('slider-inactive');
        Route::get('/slider/active/{id}', [SliderController::class, 'active'])->name('slider-active');


        Route::get('/skill/create', [SkillController::class, 'create'])->name('skill-create');
        Route::post('/skill/store', [SkillController::class, 'store'])->name('skill-store');
        Route::get('/skill', [SkillController::class, 'index'])->name('skill');
        Route::get('/skill/edit/{id}', [SkillController::class, 'edit'])->name('skill-edit');
        Route::post('/skill/update', [SkillController::class, 'update'])->name('skill-update');
        Route::get('/skill/inactive/{id}', [SkillController::class, 'inactive'])->name('skill-inactive');
        Route::get('/skill/active/{id}', [SkillController::class, 'active'])->name('skill-active');
        Route::get('/skill/delete/{id}', [SkillController::class, 'delete'])->name('skill-delete');


        Route::get('/about/video/create', [AboutVideoController::class, 'create'])->name('about-video-create');
        Route::post('/about/video/store', [AboutVideoController::class, 'store'])->name('about-video-store');
        Route::get('/about/video', [AboutVideoController::class, 'index'])->name('about-video');
        Route::post('/about/video/update', [AboutVideoController::class, 'update'])->name('about-video-update');


        Route::get('/resume/create', [ResumeController::class, 'create'])->name('resume-create');
        Route::post('/resume/store', [ResumeController::class, 'store'])->name('resume-store');
        Route::get('/resume', [ResumeController::class, 'index'])->name('resume');
        Route::post('/resume/update/{id}', [ResumeController::class, 'update'])->name('resume-update');

        Route::get('/program/know/create', [ProgramController::class, 'create'])->name('program-know-create');
        Route::post('/program/know/store', [ProgramController::class, 'store'])->name('program-know-store');

    });
});

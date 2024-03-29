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
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ExperianceController;
use App\Http\Controllers\Admin\EnquiryController;




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
        Route::get('/program/know', [ProgramController::class, 'index'])->name('program-know');
        Route::post('/program/know/update/{id}', [ProgramController::class, 'update'])->name('program-know-update');


        Route::get('/project/create', [ProjectController::class, 'create'])->name('project-create');
        Route::post('/project/store', [ProjectController::class, 'store'])->name('project-store');
        Route::get('/project', [ProjectController::class, 'index'])->name('project');
        Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('project-edit');
        Route::post('/project/update', [ProjectController::class, 'update'])->name('project-update');
        Route::get('/project/delete/{id}', [ProjectController::class, 'delete'])->name('project-delete');
        Route::get('/project/inactive/{id}', [ProjectController::class, 'inactive'])->name('project-inactive');
        Route::get('/project/active/{id}', [ProjectController::class, 'active'])->name('project-active');


        Route::get('/contact', [ContactController::class, 'index'])->name('contact');
        Route::get('/contact/delete/{id}', [ContactController::class, 'delete'])->name('contact-delete');


        Route::get('/experiance/create', [ExperianceController::class, 'create'])->name('experiance-create');
        Route::post('/experiance/store', [ExperianceController::class, 'store'])->name('experiance-store');
        Route::get('/experiance', [ExperianceController::class, 'index'])->name('experiance');
        Route::get('/experiance/edit/{id}', [ExperianceController::class, 'edit'])->name('experiance-edit');
        Route::post('/experiance/update', [ExperianceController::class, 'update'])->name('experiance-update');
        Route::get('/experiance/delete/{id}', [ExperianceController::class, 'delete'])->name('experiance-delete');
        Route::get('/experiance/inactive/{id}', [ExperianceController::class, 'inactive'])->name('experiance-inactive');
        Route::get('/experiance/active/{id}', [ExperianceController::class, 'active'])->name('experiance-active');


        Route::get('/enquiry', [EnquiryController::class, 'index'])->name('enquiry');
        Route::get('/enquiry/delete/{id}', [EnquiryController::class, 'delete'])->name('enquiry-delete');

    });
});

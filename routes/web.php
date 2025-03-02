<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::group(['account'],function(){

    Route::group(['middleware'=> 'guest'],function(){
        Route::get('register',[AccountController::class,'registration'])->name('register');
        Route::post('process-register',[AccountController::class,'processRegistration'])->name('processRegistration');
        Route::get('login',[AccountController::class,'login'])->name('login');
        Route::post('authenticate',[AccountController::class,'authenticate'])->name('authenticate');
    });

    Route::group(['middleware'=> 'auth'],function(){
        Route::get('profile',[AccountController::class,'profile'])->name('profile');
        Route::put('update-profile',[AccountController::class,'updateProfile'])->name('updateProfile');
        Route::get('logout',[AccountController::class,'logout'])->name('logout');
        Route::post('update-profile-pic',[AccountController::class,'updateProfilePic'])->name('updateProfilePic');
        Route::get('postjob',[AccountController::class,'creatrJob'])->name('postjob');
        Route::post('save-postjob',[AccountController::class,'saveJob'])->name('savejob');
        Route::get('myjobs',[AccountController::class,'myJobs'])->name('myJobs');
    });
});




Route::get('job_detail',function(){return view('job_detail');})->name('job_detail');

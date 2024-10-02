<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomLoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomRegistrationController;
// use App\Models\Post;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/admin', function () {
//     return view('admin.index');
// });

Route::middleware(['auth'])->prefix('admin')->group(function(){

    Route::get('/', function() {
       return view('admin.index');
    })->name('admin.index');

    // Route::get('/posts', function() {
    //    // return view('admin.posts.index');
    // })->name('admin.posts.index');

    Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');

    // Route::resources([

    //     '/posts' => PostController::class, 

    // ]);


});

Auth::routes();

Route::controller(HomeController::class)->group(function(){
   Route::get('/', 'index')->name('home');
   Route::get('/post/{post:slug}', 'post')->name('home.post');
   Route::get('/about', 'about')->name('home.about');
   Route::get('contact', 'contact')->name('home.contact');
});

Route::controller(CustomLoginController::class)->group(function(){
   Route::get('/custom-login', 'customShowLoginForm')->name('custom.login');
   Route::post('/custom-login', 'customLogin')->name('custom.login.form');
   Route::post('/custom-loguot', 'customlogout')->name('custom.logout.form');
   Route::get('/custom-link-form', 'customShowLink')->name('custom.link.request');
   Route::post('/custom-reset', 'customResetPassword')->name('custom.reset');
   Route::get('/custom-password/reset/{token}', 'showResetForm')->name('password.reset');
   Route::post('/custom-password/reset', 'customPasswordUpdate')->name('custom.update');
});

Route::controller(CustomRegistrationController::class)->group(function(){
   Route::view('/custom-register', 'custom-register')->name('custom.show.register');
   Route::post('/custom-register', 'customCreateRegister')->name('custom.register');
});
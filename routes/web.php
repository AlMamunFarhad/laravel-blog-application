<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
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



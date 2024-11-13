<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Post;


Route::get('/question',function(){
    return view('admin.question');
});

Route::get('/psycho-ty',function(){
    return view('admin.psycho-ty');
});

Route::get('/posts',function(){
    return view('admin.posts');
});

Route::get('/user-list',function(){
    return view('admin.user-list');
});

Route::get('/therapist-list',function(){
    return view('admin.therapist-list');
});

Route::get('/', function () {
    return view('admin.admin-dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/post-create', [PostController::class, 'store'])->name('admin.postCreate');



});
    // post

require __DIR__.'/auth.php';

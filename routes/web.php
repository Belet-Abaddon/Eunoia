<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\TherapistController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PhychotherapyTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Post;


// Route::get('/question',function(){
//     return view('admin.question');
// });

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
    Route::get('/posts',[PostController::class,'show'])->name('admin.posts');
    Route::put('/post-update', [PostController::class, 'update'])->name('admin.postUpdate');
    Route::get('/psycho-ty', [PhychotherapyTypeController::class, 'show'])->name('admin.psychoTyList');
    Route::post('/psycho-ty-create', [PhychotherapyTypeController::class, 'store'])->name('admin.psychoTyCreate');
    Route::put('/psycho-ty-update', [PhychotherapyTypeController::class, 'update'])->name('admin.psychoTyUpdate');
    Route::get('/question', [QuestionController::class, 'show'])->name('admin.questionList');
    Route::post('/question-create', [QuestionController::class, 'store'])->name('admin.questionCreate');
    Route::put('/question-update', [QuestionController::class, 'update'])->name('admin.questionUpdate');
    Route::post('/therapist-list', [TherapistController::class, 'store'])->name('admin.therapistCreate');
    Route::get('/therapist-list',[TherapistController::class,'show'])->name('admin.therapistLists');
    Route::get('/posts',[PostController::class,'show'])->name('admin.posts');
    Route::get('/user-list',[RegisteredUserController::class,'show'])->name('admin.user-list');
    Route::post('/user-list',[RegisteredUserController::class,'changeRole'])->name('admin.userRole');
});
    // post

require __DIR__.'/auth.php';

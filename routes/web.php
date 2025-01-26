<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TherapistController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PhychotherapyTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CommentController;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ContactController;

Route::get('/', [PhychotherapyTypeController::class, 'showPhychoTyList'])->name('user.home');
Route::get('/user-header', [PhychotherapyTypeController::class, 'showPhychoTy'])->name('user.header');

Route::get('/dashboard', [PhychotherapyTypeController::class, 'showPhychoTyList'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



Route::middleware('auth')->group(callback: function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // admin
    //admin dashboard

    Route::get('/admin-dashboard', [RegisteredUserController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/admin/change-role/{id}', [RegisteredUserController::class, 'changeRoleAdmin'])->name('admin.changeRole');

    //post-list
    Route::get('/admin-profile',[PostController::class, 'showInAdminProfile'])->name('admin.profile');
    Route::post('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::put('/post/update/{id}', [PostController::class, 'updatePost'])->name('post.update');
    Route::delete('/posts/{post}', [PostController::class, 'deletePost'])->name('post.delete');
    
    // phychotherapy type
    Route::get('/psycho-ty', [PhychotherapyTypeController::class, 'show'])->name('admin.psychoTyList');
    Route::post('/psycho-ty-create', [PhychotherapyTypeController::class, 'store'])->name('admin.psychoTyCreate');
    Route::put('/psycho-ty-update', [PhychotherapyTypeController::class, 'update'])->name('admin.psychoTyUpdate');
    Route::delete('/psycho-ty-delete/{id}', [PhychotherapyTypeController::class, 'destroy'])->name('admin.phychoTyDelete');
    Route::get('/search', [PhychotherapyTypeController::class, 'search'])->name('search');

    //question
    Route::get('/question', [QuestionController::class, 'show'])->name('admin.questionList');
    Route::post('/question-create', [QuestionController::class, 'store'])->name('admin.questionCreate');
    Route::put('/question-update', [QuestionController::class, 'update'])->name('admin.questionUpdate');
    Route::delete('/question-delete/{id}', [QuestionController::class, 'destroy'])->name('admin.questionDelete');
    Route::get('/questions-search', [QuestionController::class, 'search'])->name('question.search');

    //therapist
    Route::post('/therapist-list', [TherapistController::class, 'store'])->name('admin.therapistCreate');
    Route::get('/therapist-list', [TherapistController::class, 'show'])->name('admin.therapistLists');
    Route::get('/therapist-list/{id}', [TherapistController::class, 'destroy'])->name('admin.therapistDelete');
    Route::get('/therapists-search', [TherapistController::class, 'search'])->name('therapists.search');
    
    //user
    Route::get('/user-list', [RegisteredUserController::class, 'show'])->name('admin.user-list');
    Route::post('/user-list', [RegisteredUserController::class, 'changeRole'])->name('admin.userRole');
    Route::delete('/users/{id}', [RegisteredUserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users-search', [RegisteredUserController::class, 'search'])->name('users.search');

    //schedule
    Route::get('/schedule', [ScheduleController::class, 'show'])->name('admin.schedule');
    Route::post('/schedule-create', [ScheduleController::class, 'store'])->name('admin.scheduleCreate');
    Route::put('/schedule-update', [ScheduleController::class, 'update'])->name('admin.scheduleUpdate');
    Route::delete('/schedule-delete/{id}', [ScheduleController::class, 'destroy'])->name('admin.scheduleDelete');
    Route::get('/schedules-search', [ScheduleController::class, 'search'])->name('schedules.search');

    //user
    Route::get('/user-questions/{phychotherapyType}', [QuestionController::class, 'showQuestions'])->name('user.questions');
    Route::post('/questions/submit', [AnswerController::class, 'storeAnswers'])->name('questions.submit');
    Route::get('/result/{answerId}', [AnswerController::class, 'showResult'])->name('result.show');
    Route::get('/user-posts', [PostController::class, 'postList'])->name('user.posts');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/detail', [PostController::class, 'gotodetail'])->name('detailpage');
    Route::get('/posts/{id}', [PostController::class, 'showPostDetailFromHome'])->name('userHome.postDetail');
    Route::get('/post/{id}', [PostController::class, 'showPostDetailFromPosts'])->name('userPosts.postDetail');
    Route::post('/post/{id}/comment', [PostController::class, 'store'])->name('comment.store');
    Route::post('/comment/update/{commentId}', [PostController::class, 'update'])->name('comment.update');
    Route::delete('/comment/destroy/{commentId}', [PostController::class, 'destroy'])->name('comment.destroy');

    //therapist
    Route::get('/therapist-dashboard', [ContactController::class, 'getNewContacts'])->name('therapist.dashboard');
    Route::get('/contacts/{contact}/answers', [ContactController::class, 'viewContactAnswers'])->name('view.contact');
    Route::get('/patients-list', [ContactController::class, 'showPatientsList'])->name('patients.list');
    Route::get('/patient-records/{userId}', [ContactController::class, 'viewPatientRecords'])->name('patient.records');
    Route::get('/profile-therapist', [ScheduleController::class, 'showProfile'])->name('profile-therapist');

});

require __DIR__ . '/auth.php';

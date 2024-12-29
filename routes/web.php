<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TherapistController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PhychotherapyTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ContactController;



Route::get('/', [PhychotherapyTypeController::class, 'showPhychoTyList'])->name('user.home');
Route::get('/user-header', [PhychotherapyTypeController::class, 'showPhychoTy'])->name('user.header');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // admin
    //admin dashboard
    Route::get('/admin-dashboard', [RegisteredUserController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/admin/change-role/{id}', [RegisteredUserController::class, 'changeRoleAdmin'])->name('admin.changeRole');
    //post
    Route::post('/post-create', [PostController::class, 'store'])->name('admin.postCreate');
    Route::get('/posts', [PostController::class, 'show'])->name('admin.posts');
    Route::put('/post-update', [PostController::class, 'update'])->name('admin.postUpdate');


    // phychotherapy type
    Route::get('/psycho-ty', [PhychotherapyTypeController::class, 'show'])->name('admin.psychoTyList');
    Route::post('/psycho-ty-create', [PhychotherapyTypeController::class, 'store'])->name('admin.psychoTyCreate');
    Route::put('/psycho-ty-update', [PhychotherapyTypeController::class, 'update'])->name('admin.psychoTyUpdate');
    Route::get('/psycho-ty-delete/{id}', [PhychotherapyTypeController::class, 'destroy'])->name('admin.phychoTyDelete');

    //question
    Route::get('/question', [QuestionController::class, 'show'])->name('admin.questionList');
    Route::post('/question-create', [QuestionController::class, 'store'])->name('admin.questionCreate');
    Route::put('/question-update', [QuestionController::class, 'update'])->name('admin.questionUpdate');
    Route::get('/question-delete/{id}', [QuestionController::class, 'destroy'])->name('admin.questionDelete');

    //therapist
    Route::post('/therapist-list', [TherapistController::class, 'store'])->name('admin.therapistCreate');
    Route::get('/therapist-list', [TherapistController::class, 'show'])->name('admin.therapistLists');
    Route::get('/therapist-list/{id}', [TherapistController::class, 'destroy'])->name('admin.therapistDelete');

    //user
    Route::get('/user-list', [RegisteredUserController::class, 'show'])->name('admin.user-list');
    Route::post('/user-list', [RegisteredUserController::class, 'changeRole'])->name('admin.userRole');

    //schedule
    Route::get('/schedule',[ScheduleController::class,'show'])->name('admin.schedule');
    Route::post('/schedule-create',[ScheduleController::class,'store'])->name('admin.scheduleCreate');
    Route::put('/schedule-update',[ScheduleController::class,'update'])->name('admin.scheduleUpdate');
    Route::get('/schedule-delete',[ScheduleController::class,'destroy'])->name('admin.scheduleDelete');

    Route::get('/user-questions/{phychotherapyType}', [QuestionController::class, 'showQuestions'])->name('user.questions');
    Route::post('/questions/submit', [AnswerController::class, 'storeAnswers'])->name('questions.submit');
    Route::get('/result/{answerId}', [AnswerController::class, 'showResult'])->name('result.show');

    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

    Route::get('/therapist-dashboard', [ContactController::class, 'getNewContacts'])->name('therapist.dashboard');
    Route::get('/contacts/{contact}/answers', [ContactController::class, 'viewContactAnswers'])->name('view.contact');
    Route::get('/patients-list', [ContactController::class, 'showPatientsList'])->name('patients.list');
    Route::get('/patient-records/{userId}', [ContactController::class, 'viewPatientRecords'])->name('patient.records');
    Route::get('/profile-therapist', [ScheduleController::class, 'showProfile'])->name('profile-therapist');

});

require __DIR__ . '/auth.php';

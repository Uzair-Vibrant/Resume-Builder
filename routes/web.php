<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ATSController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/about-us', function () {
    return view('about');
});

Route::get('/testimonials', function () {
    return view('testimonials');
});

Route::get('/contact', function () {
    return view('contact');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resumes
    Route::get('/my-resumes', [ResumeController::class, 'index'])->name('resumes.index');
    Route::get('/builder/{step?}', [ResumeController::class, 'create'])->name('resume.builder');
    Route::post('/builder/save-step', [ResumeController::class, 'saveStep'])->name('resume.saveStep');
    Route::post('/builder/store', [ResumeController::class, 'store'])->name('resume.store');
    Route::get('/resume/{id}/edit', [ResumeController::class, 'edit'])->name('resume.edit');
    Route::put('/resume/{id}', [ResumeController::class, 'update'])->name('resume.update');
    Route::delete('/resume/{id}', [ResumeController::class, 'destroy'])->name('resume.destroy');

    // ATS Score
    Route::get('/ats-score', [ATSController::class, 'index'])->name('ats.score');

    // Job Search
    Route::get('/job-search', [JobController::class, 'index'])->name('job.search');

    // Chatbox
    Route::get('/chatbox', [ChatController::class, 'index'])->name('chatbox');
});

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public routes
Auth::routes(['verify' => true]);

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/faculities', action: 'faculities')->name('faculities');
});

// Protected routes with middleware
Route::group(['middleware' => ['auth', 'verified']], function () {

    // Admin routes
    Route::middleware(['AdminAuth'])->prefix('/admin')->group(function () {
        Route::get('/dashboard', [AdminsController::class, 'index'])->name('admin.dashboard');

        Route::controller(FacilityController::class)->prefix('/faculty')->group(function () {
            Route::get('/', 'index')->name('faculty.index');
            Route::get('/create', 'create')->name('faculty.create');
            Route::post('/store', 'store')->name('faculty.store');
            Route::get('/edit/{id}', 'edit')->name('faculty.edit');
            Route::get('/delete/{id}', 'delete')->name('faculty.delete');
            Route::post('/update', 'update')->name('faculty.update');
        });

        Route::controller(AdminsController::class)->group(function () {
            Route::get('/admins', 'show')->name('admins.show');
            Route::get('/users', 'usershow')->name('users.show');
            Route::get('/admins/create', 'create')->name('admins.create');
            Route::get('/admins/delete/{id}', 'delete')->name('admins.delete');
            Route::post('/admins/store', 'store')->name('admins.store');
            Route::get('/admins/edit/{id}', 'edit')->name('admins.edit');
            Route::post('/admins/update', 'update')->name('admins.update');

        });

        Route::get('/finaldesire', [StudentController::class, 'finaldesire'])->name('finaldesire');
        Route::get('/sendmail', [SendMailController::class, 'send'])->name('sendmail');
    });

    // Student routes

    Route::controller(StudentController::class)->prefix('/student')->group(function () {
        Route::get('/', 'index')->name('student');
        Route::post('/education', 'toeducation')->name('student.education');
        Route::post('/desider', 'todesider')->name('student.desider');
        Route::post('/store', 'store')->name('student.store');
    });
    Route::get('/profile', [StudentController::class, 'profile'])->name('profile');

});

// Email verification routes
Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

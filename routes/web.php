<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\StudentAdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WhiteListController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
    // Student routes

    Route::controller(StudentController::class)->prefix('/student')->group(function () {
        Route::get('/', 'index')->name('student');


        Route::middleware('PostAuth')->group(function () {
            Route::post('/education', 'toeducation')->name('student.education');
            Route::post('/desider', 'todesider')->name('student.desider');
            Route::post('/store', 'store')->name('student.store');
        });
    });
    Route::get('/profile', [StudentController::class, 'profile'])->name('profile')->middleware('ProfiletAuth');

});



Route::middleware(['AdminAuth'])->prefix('/admin')->group(function () {
    Route::controller(AdminLoginController::class)->group(function () {
        Route::get('/login', 'login')->name('admin.login');
        Route::get('/logout', 'logout')->name('admin.logout');
        Route::post('/connect', 'connect')->name('admin.connect');
    });





    Route::middleware(['AdminLoginAuth'])->group(function () {
        Route::get('/traffic-data', [AdminsController::class, 'getTrafficData']);
        Route::get('/dashboard', [AdminsController::class, 'index'])->name('admin.dashboard');

        Route::get('/computer-science-data', [AdminsController::class, 'getComputerScienceData']);
        //Admin Faculty
        Route::controller(FacilityController::class)->prefix('/faculty')->group(function () {
            Route::get('/', 'index')->name('faculty.index');
            Route::get('/create', 'create')->name('faculty.create');
            Route::post('/store', 'store')->name('faculty.store');
            Route::get('/edit/{id}', 'edit')->name('faculty.edit');
            Route::get('/delete/{id}', 'delete')->name('faculty.delete');
            Route::post('/update', 'update')->name('faculty.update');
        });

        //Student
        Route::controller(StudentAdminController::class)->group(function () {
            Route::get('search', 'search')->name('student.search');
            Route::post('result', 'result')->name('student.result');
            Route::get('edit/{id}', 'edit')->name('student.edit');
            Route::post('update', 'update')->name('student.update');
        });

        //IP
        Route::controller(WhiteListController::class)->prefix('/ip')->group(function () {
            Route::get('/', 'index')->name('ip.index');
            Route::get('/create', 'create')->name('ip.create');
            Route::post('/store', 'store')->name('ip.store');
            Route::get('/delete/{id}', 'delete')->name('ip.delete');
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
});

// Email verification routes
Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});


Route::get('/get_ip', function (Request $request) {
    return $request->ip();
});

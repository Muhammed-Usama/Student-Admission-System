<?php
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/log', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/signup', [LoginController::class, 'signup'])->name('signup');

// Protected routes with middleware
Route::middleware(['LoginAuth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });


    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', [AdminsController::class, 'index'])->name('admin.dashboard');
    });
    Route::prefix('/faculty')->group(function () {
        Route::get('/index', [FacilityController::class, 'index'])->name('faculty.index');
        Route::get('/create', [FacilityController::class, 'create'])->name('faculty.create');
        Route::post('/store', [FacilityController::class, 'store'])->name('faculty.store');
        Route::get('/edit/{id}', [FacilityController::class, 'edit'])->name('faculty.edit');
        Route::get('/delete/{id}', [FacilityController::class, 'delete'])->name('faculty.delete');
        Route::post('/update', [FacilityController::class, 'update'])->name('faculty.update');
    });


    Route::prefix('/student')->group(function () {
        Route::get('', [StudentController::class, 'index'])->name('student');
        Route::post('/education', [StudentController::class, 'toeducation'])->name('student.education');
        Route::post('/desider', [StudentController::class, 'todesider'])->name('student.desider');
        Route::post('/store', [StudentController::class, 'store'])->name('student.store');
    });

    Route::get('/finaldesire', [StudentController::class, 'finaldesire'])->name('finaldesire');
    Route::get('/sendmail', [SendMailController::class, 'send'])->name('sendmail');
});

Route::get('/profile', [StudentController::class, 'profile'])->name('profile');

// Logout route
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

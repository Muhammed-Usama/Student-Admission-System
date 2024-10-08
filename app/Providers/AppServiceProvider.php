<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Facility;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['admin.layout.layout', 'admin.layout.layout'], function ($view) {
            $facultiesCount = Facility::count();
            $studentsCount = Student::count();
            $adminsCount = Admin::count();
            $usersCount = User::count();
            $view->with([
                'facultiesCount' => $facultiesCount,
                'adminsCount' => $adminsCount,
                'studentsCount' => $studentsCount,
                'usersCount' => $usersCount,

            ]);
        });
    }
}

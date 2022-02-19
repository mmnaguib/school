<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repository\TeacherRepositoryInterface;
use App\Repository\TeacherRepository;
use App\Repository\Students\StudentRepositoryInterface;
use App\Repository\Students\StudentRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TeacherRepositoryInterface::class,TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class,StudentRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}

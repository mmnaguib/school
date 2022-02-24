<?php

namespace App\Providers;

use App\Repository\Fee\feeRepository;
use App\Repository\Fee\feeRepositoryInterface;
use App\Repository\Graduated\GraduatedRepository;
use App\Repository\Graduated\GraduatedRepositoryInterface;
use App\Repository\Promotions\PromotionRepository;
use App\Repository\Promotions\PromotionRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repository\TeacherRepositoryInterface;
use App\Repository\TeacherRepository;
use App\Repository\Students\StudentRepositoryInterface;
use App\Repository\Students\StudentRepository;
class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TeacherRepositoryInterface::class,TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class,StudentRepository::class);
        $this->app->bind(PromotionRepositoryInterface::class,PromotionRepository::class);
        $this->app->bind(GraduatedRepositoryInterface::class,GraduatedRepository::class);
        $this->app->bind(feeRepositoryInterface::class,feeRepository::class);
    }
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}

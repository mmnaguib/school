<?php

namespace App\Providers;

use App\Repository\Attendance\AttendanceRepository;
use App\Repository\Attendance\attendanceRepositoryInterface;
use App\Repository\Attendance\AttendanceRepositoryInterface as AttendanceAttendanceRepositoryInterface;
use App\Repository\Exam\ExamRepository;
use App\Repository\Exam\ExamRepositoryInterface;
use App\Repository\Fee\feeRepository;
use App\Repository\Fee\feeRepositoryInterface;
use App\Repository\FeeInvoices\FeeInvoicesRepository;
use App\Repository\FeeInvoices\FeeInvoicesRepositoryInterface;
use App\Repository\Graduated\GraduatedRepository;
use App\Repository\Graduated\GraduatedRepositoryInterface;
use App\Repository\Payment\PaymentRepository;
use App\Repository\Payment\PaymentRepositoryInterface;
use App\Repository\ProcessFee\ProcessFeeRepository;
use App\Repository\ProcessFee\ProcessFeeRepositoryInterface;
use App\Repository\Promotions\PromotionRepository;
use App\Repository\Promotions\PromotionRepositoryInterface;
use App\Repository\Qizzes\QuizzRepository;
use App\Repository\Qizzes\QuizzRepositoryInterface;
use App\Repository\Questions\QuestionRepository;
use App\Repository\Questions\QuestionRepositoryInterface;
use App\Repository\ReceiptStudent\ReceiptStudentRepository;
use App\Repository\ReceiptStudent\ReceiptStudentRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repository\TeacherRepositoryInterface;
use App\Repository\TeacherRepository;
use App\Repository\Students\StudentRepositoryInterface;
use App\Repository\Students\StudentRepository;
use App\Repository\Subjects\SubjectRepository;
use App\Repository\Subjects\SubjectRepositoryInterface;
use App\Repository\Zoom\ZoomRepository;
use App\Repository\Zoom\ZoomRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TeacherRepositoryInterface::class,TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class,StudentRepository::class);
        $this->app->bind(PromotionRepositoryInterface::class,PromotionRepository::class);
        $this->app->bind(GraduatedRepositoryInterface::class,GraduatedRepository::class);
        $this->app->bind(feeRepositoryInterface::class,feeRepository::class);
        $this->app->bind(FeeInvoicesRepositoryInterface::class,FeeInvoicesRepository::class);
        $this->app->bind(ReceiptStudentRepositoryInterface::class,ReceiptStudentRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class,PaymentRepository::class);
        $this->app->bind(ProcessFeeRepositoryInterface::class, ProcessFeeRepository::class);
        $this->app->bind(AttendanceAttendanceRepositoryInterface::class, AttendanceRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        $this->app->bind(QuizzRepositoryInterface::class, QuizzRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(ZoomRepositoryInterface::class, ZoomRepository::class);
    }
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}

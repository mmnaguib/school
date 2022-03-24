<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\Students\FeeContorller;
use App\Http\Controllers\Students\feeInvoicesController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\PaymentController;
use App\Http\Controllers\Students\ReceiptStudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Students\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::group(['middleware' => 'guest' ], function(){ //...
    Route::get('/', function () {return view('auth.login');});
});

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]], function(){ //...
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //Grades
    Route::resource('grades', GradeController::class);
    // classromms
    Route::resource('classroom', ClassroomController::class);
    Route::post('delete_all', [ClassroomController::class,'delete_all'])->name('delete_all');
    Route::post('fiterClasses', [ClassroomController::class,'fiterClasses'])->name('fiterClasses');
    // Sections
    Route::resource('sections', SectionsController::class);
    Route::get('classes/{id}', [SectionsController::class,'getClasses']);
    // Parents
    Route::view('parents', 'livewire.parents');
    // Teachers
    Route::resource('teachers', TeacherController::class);
    // Students && Promotions && Graduated && Fees && Fees Invoices
    Route::resource('students', StudentController::class);
    Route::resource('promotions', PromotionController::class);
    Route::resource('graduated', GraduatedController::class);
    Route::get('getSections/{id}', [StudentController::class,'getSections']);
    Route::post('uploadAttachment', [StudentController::class,'uploadAttachment'])->name('uploadAttachment');
    Route::get('download_attachment/{student_name}/{file_name}', [StudentController::class,'download_attachment'])->name('download_attachment');
    Route::post('delete_attachment/{id}', [StudentController::class,'delete_attachment'])->name('delete_attachment');
    Route::resource('fees', FeeContorller::class);
    Route::resource('feesInvoices', feeInvoicesController::class);
    Route::resource('receipts', ReceiptStudentController::class);
    Route::resource('payment_students', PaymentController::class);
});

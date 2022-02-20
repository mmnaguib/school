<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
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
    Route::resource('grades', GradeController::class);

    Route::resource('classroom', ClassroomController::class);
    Route::post('delete_all', [ClassroomController::class,'delete_all'])->name('delete_all');
    Route::post('fiterClasses', [ClassroomController::class,'fiterClasses'])->name('fiterClasses');
    Route::resource('sections', SectionsController::class);
    Route::get('classes/{id}', [SectionsController::class,'getClasses']);

    Route::resource('teachers', TeacherController::class);
    Route::resource('students', StudentController::class);
    Route::get('getSections/{id}', [StudentController::class,'getSections']);
    Route::view('parents', 'livewire.parents');
});

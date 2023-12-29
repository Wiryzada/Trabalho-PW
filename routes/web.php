<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\InstitutionsController;
use App\Http\Controllers\StudentVoucherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect("/login");
});

Route::group(['controller' => AuthController::class], function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});


Route::middleware(['web'])->group(function () {
    Route::group(['controller' => UserController::class], function () {
        Route::get('/admin/home', 'index')->name('users.index');
    });


    Route::group(['controller' => StudentVoucherController::class], function () {
        Route::get('/student/create', 'create')->name('student-voucher.create');
        Route::get('/student/view', 'showByStudent')->name('student-voucher.showByStudent');
        Route::post('/student/store', 'store')->name('student-voucher.store');
        Route::get('/institution/{institutionId}/courses', 'getCoursesByInstitution')->name('student-voucher.getCoursesByInstitution');
        Route::get('/admin/student-voucher', 'index')->name('student-voucher.index');
        Route::get('/admin/student-voucher/{studentVoucher}/show', 'show')->name('student-voucher.show');
        Route::put('/admin/student-voucher/{studentVoucher}/update', 'update')->name('student-voucher.update');
    });

    Route::resource('/admin/institutions', InstitutionsController::class);

    Route::resource('/admin/courses', CoursesController::class);
});

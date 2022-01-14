<?php

use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Student

Route::get('/admin/student', [StudentController::class, 'index'])->name('showStudent');
Route::get('/admin/student/{id}', [StudentController::class, 'show'])->name('detailStudent');
Route::get('/admin/students/create', [StudentController::class, 'create'])->name('createStudent');
Route::post('/admin/students/store', [StudentController::class, 'store'])->name('storeStudent');
Route::get('/admin/students/edit/{id}', [StudentController::class, 'edit'])->name('editStudent');
Route::put('/admin/students/update/{id}', [StudentController::class, 'update'])->name('updateStudent');
Route::delete('/admin/students/delete/{id}', [StudentController::class, 'destroy'])->name('deleteStudent');
// End student


// Point
Route::get('/admin/point/create', [PointController::class, 'create'])->name('createPoint');
Route::post('/admin/point/store', [PointController::class, 'store'])->name('storePoint');

//end point
// Teacher
Route::get('/login', [TeacherController::class, 'getLoginForm'])->name('loginForm');
Route::post('/postlogin', [TeacherController::class], 'loginForm')->name('loginForm');
Route::post('/logout', [TeacherController::class, 'logout'])->name('logout');
// End Teacher

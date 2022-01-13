<?php

use App\Http\Controllers\StudentController;
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

// Start Student
Route::get('/student', [StudentController::class, 'index']);
Route::get('/student/{id}', [StudentController::class, 'show'])->name('detailStudent');
Route::get('/create', [StudentController::class, 'create'])->name('createStudent');
Route::post('/store', [StudentController::class, 'store'])->name('storeStudent');
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('editStudent');
Route::put('/update/{id}', [StudentController::class, 'update'])->name('updateStudent');
Route::delete('/delete/{id}', [StudentController::class], 'destroy')->name('deleteStudent');
// End student

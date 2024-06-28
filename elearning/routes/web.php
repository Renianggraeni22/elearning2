<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\studentController;



/** Jenis Method HTTP:
 * 1. GET= menampilkan halaman
 * 2. POST= mengirim data
 * 3. PUT= meng-update data
 * 4. DELETE= menghapus data
 */
//route baru untuk menampilkan teks 
Route::get('/Hallo/{nama}', function($nama){
    return "Assalamualaikum...$nama";
});





Route::get('admin/student/create', [studentController::class, 'create']);

//untuk mengirim data
Route::post('admin/student/store', [studentController::class, 'store']);

    
//Route untuk edit student
Route::get('admin/student/edit/{id}', [studentController::class, 'edit']);

//untuk menampilkan halaman edit

// Route untuk menyimpan update student
Route::put('admin/student/update/{id}', [studentController::class, 'update']);

//route untuk menghapus student
Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);


//Course

Route::get('admin/course/create', [CourseController::class, 'create']);

//untuk mengirim data
Route::post('admin/course/store', [CourseController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('admin/student', [studentController::class, 'index']);

    Route::get('admin/course', [CourseController::class, 'index']);

    Route::get('admin/Dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/student', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Asignamos las rutas para los métodos de Alumno
// middleware -> necesario estar logeado
Route::resource('students', StudentController::class)
->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';


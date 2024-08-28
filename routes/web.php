<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecialtyController;

// Ruta para la página de inicio
Route::get('/', [DoctorController::class, 'index'])->name('home');

// Rutas para el recurso Doctor
Route::resource('doctors', DoctorController::class);

Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');

Route::delete('/doctors/{doctor}', [DoctorController::class, 'destroy'])->name('doctors.destroy');

Route::resource('specialties', SpecialtyController::class);
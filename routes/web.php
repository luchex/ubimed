<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecialtyController;

Route::get('/', [DoctorController::class, 'index'])->name('home');
Route::resource('doctors', DoctorController::class);
Route::resource('specialties', SpecialtyController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EscuelaController;

Route::view('/','index')->name('index');
Route::get('/escuelas', [EscuelaController::class, 'index'])->name('escuelas.index');
Route::get('/escuelas/create', [EscuelaController::class, 'create'])->name('escuelas.create');
Route::post('/escuelas', [EscuelaController::class, 'store'])->name('escuelas.store');

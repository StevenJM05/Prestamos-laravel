<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EscuelaController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AlumnoController;

Route::view('/','index')->name('index');

//Escuela
Route::get('/escuelas', [EscuelaController::class, 'index'])->name('escuelas.index');
Route::get('/escuelas/create', [EscuelaController::class, 'create'])->name('escuelas.create');
Route::post('/escuelas', [EscuelaController::class, 'store'])->name('escuelas.store');
Route::get('/escuelas/edit/{id}',[EscuelaController::class, 'edit'])->name('escuelas.edit');
//Carrera
Route::get('/carreras', [CarreraController::class, 'index'])->name('carreras.index');
//Libros
Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
//Alumno
Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::get('/alumnos/create', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::post('/alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');
Route::get('/alumnos/{id}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit');
Route::put('/alumnos/{id}', [AlumnoController::class, 'update'])->name('alumnos.update');
Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');

//Prestamo
Route::get('/prestamos', [PrestamoController::class, 'index'])->name('prestamo.index');
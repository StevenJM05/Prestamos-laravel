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
Route::put('/escuelas/{id}',[EscuelaController::class, 'update'])->name('escuelas.update');
Route::delete('/escuelas/{id}',[EscuelaController::class, 'destroy'])->name('escuelas.destroy');
//Carrera
Route::get('/carreras', [CarreraController::class, 'index'])->name('carreras.index');
Route::get('/carreras/create', [CarreraController::class, 'create'])->name('carreras.create');
Route::post('/carreras', [CarreraController::class, 'store'])->name('carreras.store');
Route::get('/carreras/{id}/edit', [CarreraController::class, 'edit'])->name('carreras.edit');
Route::put('/carreras/{id}', [CarreraController::class, 'update'])->name('carreras.update');
Route::delete('/carreras/{id}',[CarreraController::class, 'destroy'])->name('carreras.destroy');
//Libros
Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('/libros/create', [LibroController::class, 'create'])->name('libros.create');
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
Route::get('/libros/{id}/edit', [LibroController::class, 'edit'])->name('libros.edit');
Route::put('/libros/{id}', [LibroController::class, 'update'])->name('libros.update');
Route::delete('/libros/{id}',[LibroController::class, 'destroy'])->name('libros.destroy');
Route::resource('libros', LibroController::class);
//Alumno
Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::get('/alumnos/create', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::post('/alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');
Route::get('/alumnos/{id}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit');
Route::put('/alumnos/{id}', [AlumnoController::class, 'update'])->name('alumnos.update');
Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');
Route::get('/alumnos/{id}/prestamos', [AlumnoController::class, 'prestamos'])->name('alumnos.prestamos');

//Prestamo
Route::get('/prestamos', [PrestamoController::class, 'index'])->name('prestamo.index');
Route::get('/prestamos/create', [PrestamoController::class, 'create'])->name('prestamos.create');
Route::post('/prestamos', [PrestamoController::class, 'store'])->name('prestamos.store');
Route::get('/prestamos/edit/{id}', [PrestamoController::class, 'edit'])->name('prestamos.edit');
Route::put('/prestamos/{id}', [PrestamoController::class, 'update'])->name('prestamos.update');
Route::put('/prestamos/{id}/estado', [PrestamoController::class, 'estado'])->name('prestamos.estado');
Route::delete('/prestamos/{id}', [PrestamoController::class, 'destroy'])->name('prestamos.destroy');



//busquedas
Route::get('search-students', [AlumnoController::class, 'search'])->name('search-students');
Route::get('search-books', [LibroController::class, 'search'])->name('search-books');

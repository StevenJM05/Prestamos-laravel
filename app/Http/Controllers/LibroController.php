<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::paginate(20); 
        return view('libro.libro', compact('libros'));
    }
}

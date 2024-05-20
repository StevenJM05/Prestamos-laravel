<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with(['libro', 'alumno'])->paginate(10);
        return view('prestamo.prestamo', compact('prestamos'));
    }
}

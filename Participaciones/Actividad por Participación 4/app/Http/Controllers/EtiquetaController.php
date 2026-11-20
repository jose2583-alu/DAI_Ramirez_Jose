<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    public function index()
    {
        $etiquetas = Etiqueta::latest()->get();
        return view('etiquetas.index', compact('etiquetas'));
    }

    public function create()
    {
        return view('etiquetas.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|min:3|max:50',
            'color' => 'required|string|max:20',
        ]);

        Etiqueta::create($datos);

        return redirect()->route('etiquetas.index')
            ->with('success', 'Etiqueta creada correctamente.');
    }
}
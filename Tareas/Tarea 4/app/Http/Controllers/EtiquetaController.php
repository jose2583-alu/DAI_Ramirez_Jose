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

    public function edit($id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        return view('etiquetas.edit', compact('etiqueta'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|min:3|max:50',
            'color' => 'required|string|max:20',
        ]);

        $etiqueta = Etiqueta::findOrFail($id);
        $etiqueta->update($datos);

        return redirect()->route('etiquetas.index')
            ->with('success', 'Etiqueta actualizada correctamente.');
    }

    public function destroy($id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        $etiqueta->delete();

        return redirect()->route('etiquetas.index')
            ->with('success', 'Etiqueta eliminada correctamente.');
    }
}
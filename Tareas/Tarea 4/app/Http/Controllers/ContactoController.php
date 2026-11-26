<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        $mensajes = Mensaje::latest()->get();
        return view('contacto.index', compact('mensajes'));
    }

    public function create()
    {
        return view('contacto.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'email' => 'required|email|max:150',
            'mensaje' => 'required|string|min:5|max:500',
        ]);

        Mensaje::create($datos);

        return redirect()->route('contacto.index')
            ->with('success', 'Mensaje enviado correctamente.');
    }

    public function edit($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        return view('contacto.edit', compact('mensaje'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'email' => 'required|email|max:150',
            'mensaje' => 'required|string|min:5|max:500',
        ]);

        $mensaje = Mensaje::findOrFail($id);
        $mensaje->update($datos);

        return redirect()->route('contacto.index')
            ->with('success', 'Mensaje actualizado correctamente.');
    }

    public function destroy($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->delete();

        return redirect()->route('contacto.index')
            ->with('success', 'Mensaje eliminado correctamente.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        return Categoria::latest()->get();
    }

    public function show($id)
    {
        return Categoria::find($id);
    }
}
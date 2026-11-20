<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Posts::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'title' => 'required|string|min:5|max:255',
            'body' => 'required|string|min:10',
        ]);

        Posts::create($datos);

        return redirect()->route('posts.index')
            ->with('success', 'Post publicado correctamente.');
    }
}
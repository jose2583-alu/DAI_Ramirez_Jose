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
            'title' => 'required|string|min:5|max:120',
            'body' => 'required|string|min:10|max:2000',
        ]);

        Posts::create($datos);

        return redirect()->route('posts.index')
            ->with('success', 'Post publicado correctamente.');
    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'title' => 'required|string|min:5|max:120',
            'body' => 'required|string|min:10|max:2000',
        ]);

        $post = Posts::findOrFail($id);
        $post->update($datos);

        return redirect()->route('posts.index')
            ->with('success', 'Post actualizado correctamente.');
    }

    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post eliminado correctamente.');
    }
}
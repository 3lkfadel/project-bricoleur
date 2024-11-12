<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'comments', 'likes'])->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Création d'un nouveau post
        $post = new Post();
        $post->user_id = Auth::id(); // Assurez-vous que l'utilisateur est connecté
        $post->title = $request->title; // Assurez-vous que cela correspond
        $post->content = $request->content; // Assurez-vous que cela correspond

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('images', 'public');
        }

        // Sauvegarde du post
        $post->save();

        // Redirection après succès
        return redirect()->route('posts.index')->with('success', 'Post créé avec succès !');
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}

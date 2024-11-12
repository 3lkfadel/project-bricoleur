<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function store(Post $post)
    {
        $post->likes()->create(['user_id' => Auth::id()]);
        return back()->with('success', 'Liked!');
    }

    public function destroy(Post $post)
    {
        $post->likes()->where('user_id', Auth::id())->delete();
        return back()->with('success', 'Like removed.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // <--- hna

class PostController extends Controller
{
    use AuthorizesRequests; // <--- hna

    public function index()
    {
        $posts = Post::with('likes')->latest()->get();
        return view('posts', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'content'=>'required|string'
        ]);

        Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'user_id'=>session('user_id')
        ]);

        return redirect()->back();
    }
public function update(Request $request, Post $post)
{
    if ($post->user_id != session('user_id')) {
        abort(403, "You are not allowed to update this post");
    }

    $request->validate([
        'title'=>'required|string|max:255',
        'content'=>'required|string'
    ]);

    $post->update([
        'title'=>$request->title,
        'content'=>$request->content
    ]);

    return redirect()->back();
}

public function destroy(Post $post)
{
    if ($post->user_id != session('user_id')) {
        abort(403, "You are not allowed to delete this post");
    }

    $post->delete();
    return redirect()->back();
}

    public function like(Post $post)
    {
        Like::create([
            'user_id'=>session('user_id'),
            'post_id'=>$post->id
        ]);

        return response()->json(['success'=>true]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('tags')->withCount('comments')->get();
        return view('posts.index', compact('posts'));
    }
    
    public function show($id){
        $post = Post::with(['tags', 'comments'])->find($id);
        return view('posts.show', compact('post'));
    }

    public function searchByTag($tagName) {
    $posts = Post::whereHas('tags', fn($q) => $q->where('name', $tagName))->get();
    return view('posts.index', compact('posts'));
    }
}

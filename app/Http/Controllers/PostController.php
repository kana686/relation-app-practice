<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('tags')->withCount('comments')->get();
    }
    
    public function show(){
        $posts = Post::whereHas('tags', fn($q) => $q->where('name', $tagName))->get();
    }
}

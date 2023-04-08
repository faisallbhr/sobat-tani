<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('users.welcome', [
            'posts' => Post::latest()->paginate(10)
        ]);
    }
    public function show(Post $post)
    {
        return view('users.show', [
            'post' => $post
        ]);
    }
}

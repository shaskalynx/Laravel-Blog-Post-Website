<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function displayProfilePosts (Post $post) {
        $posts = [];
        if (auth()->check()) {
            $posts = auth()->user()->userPosts()->latest()->paginate(5);
        }
        
    
        return view('profile', ['posts' => $posts]);

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function editPost(Post $post) {
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/')->with('error', 'You are not authorized to edit this post.');
        }

        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Post $post, Request $request) {
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/')->with('error', 'You are not authorized to edit this post.');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $post->update($incomingFields);
        return redirect('/')->with('success', 'Post updated successfully.');
    }

    public function deletePost(Post $post) {
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/')->with('error', 'You are not authorized to delete this post.');
        }

        $post->delete();
        return redirect('/')->with('success', 'Post deleted successfully.');
    }

    public function createPost(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);    
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return redirect('/');
    }
}

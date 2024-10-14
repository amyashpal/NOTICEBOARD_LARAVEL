<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display all posts
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Show form to create a post
    public function create()
    {
        return view('posts.create');
    }

    // Store the post data with file upload handling
    public function store(Request $request)
    {
        // Validate input fields and file upload
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf|max:2048',
        ]);
        
    
        // Create a new Post instance
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
    
        // Handle the file upload if provided
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            // Ensure the original file name is a string
            $filename = time() . '_' . (string) $file->getClientOriginalName();
        
            // Move the uploaded file to the public/uploads directory
            $file->move(public_path('uploads'), $filename);
        
            // Store the file path in the database
            $post->file_path = 'uploads/' . $filename;
        }
        
    
        // Save the post and redirect to the index page
        $post->save();
        return redirect('/')->with('success', 'Post created successfully!');
    }
    
}

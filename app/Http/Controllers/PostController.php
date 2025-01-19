<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the posts
        $posts = Post::latest()->get();
        // Return the view with the posts
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Return the view for the create blade
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Get the image uploaded by the user
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images');
            // Store the image name in the database
            $imageName = basename($image);
            // dd($imageName);
        }

        // Get the authenticated user to associate the post with
        $user = Auth::user();
        // Create a new post instance and save it to the database.
        $post = new Post();
        $post->user_id = $user->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $imageName;
        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // dd($post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //Validate the request
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Get the image uploaded by the user
        if ($request->hasFile('image')) {
            // Delete the old image
            Storage::delete('public/images/' . $post->image);
            // Get the new image name
            $image = $request->file('image')->store('images');
            // Store the image name in the database
            $imageName = basename($image);
            $post->image = $imageName;
            // dd($imageName);
        }
        // Update the post in the database
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //Delete the image from the storage
        if ($post->image) {
            Storage::delete('public/images/' . $post->image);
        }
        // Delete the post from the database
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}

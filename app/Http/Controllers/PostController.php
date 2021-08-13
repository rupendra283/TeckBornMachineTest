<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();

        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
        return  view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // dd($categories);
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required',
            'image' => 'nullable',
            'description' => 'nullable',
            // 'status' => 'nullable',
            'category' => 'nullable',
        ]);

        $user = Auth::user();
        $post = new Post();
        $imageUrl = null;
        if ($request->hasFile('image')) {
            $img = $request->image;
            $filename = $img->getClientOriginalName();
            $imageUrl = Storage::putFileAs('/public/images', $request->file('image'), $filename);
        }
        $post->title = $request->title;
        $post->image = $imageUrl;
        $post->description = $request->description;
        // $post->status = $request->status;
        $post->category_id = $request->category;
        $post->user_id = $user->id;
        $post->save();
        return redirect()->route('post.index')->with('success', "pot added succesfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

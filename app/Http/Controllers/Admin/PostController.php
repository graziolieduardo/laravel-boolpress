<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation 

        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'content' => 'required',
            'tags' => 'exists:tags,id'
        ]);

        // data request 
        $form_data = $request->all();
        $newPost = new Post();
        $newPost->fill($form_data);

        $slug = Str::slug($newPost->title);
        $newPost->slug = $slug;
        $newPost->save();

        $newPost->tag()->attach($form_data['tags']);

        return redirect()->route('admin.posts.index')->with('status', 'Post Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            abort(404);
        }
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // validation 
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'content' => 'required',
            'tags' => 'exists:tags,id'
        ]);

        // data request 
        $data = $request->all();
        $post->update($data);

        if(array_key_exists('tags', $data)) {
            $post->tag()->sync($data['tags']);
        } else {
            $post->tag()->sync([]);
        }

        return redirect()->route('admin.posts.index')->with('modified', 'Post Modified Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('deleted', 'Post deleted');
    }
}

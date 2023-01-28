<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //
        $posts = auth()->user()->posts;
        // $posts = Post::all();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        // $request and request() helper does the same
        $inputs = $request->validate([
            'title' => 'required',
            'post_image' => 'mimes:jpg,png',
            'body' => 'required'
        ]);

        if ($request->post_image) {
            $inputs['post_image'] = $request->post_image->store('images', 'public');
        }

        auth()->user()->posts()->create($inputs);

        $request->session()->flash('post-created-message', 'Post was created.');

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('blog-post', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        //
        $this->authorize('view', $post);

        return view('admin.posts.edit', ['post' => $post]);
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
        $inputs = $request->validate([
            'title' => 'required',
            'post_image' => 'mimes:jpg,png',
            'body' => 'required'
        ]);

        if ($request->post_image) {
            $inputs['post_image'] = $request->post_image->store('images', 'public');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        // Change owner of posts with the admin who updated it
        // auth()->user()->posts()->save($post);

        $this->authorize('update', $post);
        // Retain original owner of post
        // $post->save();
        $post->update();

        $request->session()->flash('post-updated-message', 'Post was updated.');

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     */
    public function destroy(Post $post, Request $request)
    {
        //
        $this->authorize('delete', $post);

        $post->delete();
        $request->session()->flash('post-deleted-message', 'Post was deleted.');
        //Session::flash('message', 'Post was deleted.');

        return back();
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePost;
use App\Http\Requests\Post\UpdatePost;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Faker\Provider\ar_JO\Company;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Post::class);

        $posts = Post::latest()->paginate(5);
        $postsAll = Post::all();

        $allLikers = [];
        foreach ($postsAll as $post) {
            foreach ($post->likes as $like) {
                $allLikers[] = $like->liker_id;
            }
        }
        //dd($allLikers);

        return view('posts.index', ['posts' => $posts, 'likers' => $allLikers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;
        Post::create($validated);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $this->authorize('view', $post);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, Post $post)
    {
        //$this->authorize('update', $post);
        // $post = fill($request->all());
        $post->title = $request->get('title');
        $post->body = $request->get('body');

        $post->save();

        return redirect('/posts/' . $post->id)->with('success', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect('/posts');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::where('id', '=', Post::all()->user_id)->get();

        // dd($users);

        return view('home')->with([
            'posts' => Post::all(),
            // 'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:10',
            'content' => 'required|max:200',
        ]);

        $post = new Post;

        $post->content = $request->input('content');
        $post->title = $request->input('title');
        $post->user_id = Auth::user()->id;

        $post->save();

        return view('home')->with([
            'posts' => Post::all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $post = Post::findOrFail($id);

        $comments = Comment::where('post_id', '=', $id)->get();

        $user = User::where('id', '=', Auth::user()->id)->get();

        return view('posts.show')->with([
            'post' => $post,
            'comments' => $comments,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit')->with(['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'title' => 'required|max:10',
            'content' => 'required|max:200',
        ]);

        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect(url('/posts'))->with([
            'posts' => Post::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $post = Post::findOrfail($id);
        $post->delete();

        return redirect(url('/posts'))->with([
            'posts' => Post::all(),
            'users' => User::all()
        ]);
    }
}

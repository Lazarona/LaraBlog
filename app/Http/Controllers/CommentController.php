<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $repost = [
            'content' => 'required|max:200',
        ];


        Comment::create($repost);

        // Comment::where('active', 1)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, String $id)
    {

        $request->validate([
            'content' => 'required|max:200',
        ]);

        $comment = new Comment;

        $comment->content = $request->input('content');
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;
        $comment->save();

        $user = User::where('id', '=', $comment->user_id)->get();

        return view('posts.show')->with([
            'post' => Post::findOrFail($id),
            'comments' => Comment::all(),
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.edit')->with(['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

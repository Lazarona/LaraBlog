<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
            'title' => 'required|max:10',
            'content' => 'required|max:200',
        ];


        Comment::create($repost);

        Comment::where('active', 1)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);

        $comments = Comment::where('comment_id', '=', $id)->get();

        return view('comment.show', compact('post', 'comments'));
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

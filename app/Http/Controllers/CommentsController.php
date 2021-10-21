<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function index($post)
    {
        /*
            select * from comments where post_id = ?
            order by created_at desc;
        */
        $comments = Comment::where('post_id', $post)->latest();
        return $comments;
    }

    /*
        public function index(Post $post)
    {
        $post->comments;
        return view('bbs.show', $comments);
    }

    */

    public function store(Request $request, $post)
    {
        $comment = new Comment;
        $comment->commnet = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post;

        $comment->save();

        return $comment;
    }

    public function update(Request $request, $post)
    {
        $comment = Comment::where('post_id', $post);
        $comment->comment = $request->comment;

        return $comment;
    }

    public function destroy($id)
    {
        return Comment::find($id)->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function index($post_id)
    {
        /*
            select * from comments where post_id = ?
            order by created_at desc;
        */
        $comments = Comment::with('user')->where('post_id', $post_id)->latest()->paginate(2);
        return $comments;
    }

    /*
        public function index(Post $post)
    {
        $post->comments;
        return view('bbs.show', $comments);
    }

    */

    public function store(Request $request, $post_id)
    {
        //라우터파라미터: web.php에서 주소창에 매개변수로 준 것
        $request->validate(['comment' => 'require']);
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post_id;

        $comment->save();

        return $comment;
    }

    public function update(Request $request, $com_id)
    {
        $comment = Comment::find($com_id);
        $comment->comment = $request->comment;
        // update comments set comment=?, updated_at=now() where id = ?

        return $comment;
    }

    public function destroy($id)
    {
        return Comment::find($id)->delete();

        /*
        $comment = Comment::find($id)->latest()->get();
        $comment->delete();
        return $comment
        */
    }
}

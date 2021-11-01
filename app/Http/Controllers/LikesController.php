<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    /*
        로그인된 사용자의 좋아요/좋아요 취소 요청 처리
    */

    public function store(Post $post)
    {
        // 다대다 관계는 또한 주어진 ID들의 추가 상태를 "전환" 할 수 있는 toggle 메소드를 제공합니다. 
        // 주어진 ID가 현재 추가되어 있으면 해제됩니다. 마찬가지로 현재 해제되어 있다면 추가될 것입니다.

        return $post->likes()->toggle(Auth::user()->id, $post->id);
    }
}

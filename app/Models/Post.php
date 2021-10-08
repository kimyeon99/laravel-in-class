<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; //trait, factory를 쓸 수 있다.

    protected $fillable = [
        "user_id",
        "title",
        "content",
        "image",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
        /*
        select p.*, u.*
        from uesrs u, posts p
        inner join on u.id = p.user_id
        
        */
    }

    // 글의 좋아요 수
    public function likes()
    {
        //N:M은 many로 표현한다.
        return $this->belongsToMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
        // return $this->belongsTo(X::class, 'user_id', 'id', users)
        /*
            SELECT *
            FROM USERS
            WHERE id = $this.user_id

        */
    }
}

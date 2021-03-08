<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaLoveComment extends Model
{
    //
    protected $table = 'media_love_comment';

    protected $fillable = ['id','user_id', 'media_id', 'love', 'comment'];
}

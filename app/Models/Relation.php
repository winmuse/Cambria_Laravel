<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $table = 'user_relation';

    protected $fillable = ['id','user_id', 'creator_id','relation']; 
    protected $casts = [
        'id'                => 'integer',
        'user_id'           => 'integer',
        'creator_id'        => 'integer',  
        'relation'          => 'integer',
    ];
}
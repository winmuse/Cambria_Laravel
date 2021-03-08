<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paid extends Model
{
    protected $table = 'user_paid';

    protected $fillable = ['id','user_id', 'creator_id','paid','created_at','finished_at']; 
    protected $casts = [
        'id'                => 'integer',
        'user_id'           => 'integer',
        'creator_id'        => 'integer',  
        'paid'              => 'float',
    ];
}
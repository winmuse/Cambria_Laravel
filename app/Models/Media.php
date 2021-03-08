<?php

namespace App\Models;

use App\Traits\ImageTrait;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media_upload';

    protected $fillable = ['id','photo_url', 'user_id', 'type', 'comment','privacy','created_at','updated_at'];

 
	
    public $timestamps = false;
    static $PATH = 'mediadata';
    static $THUMB_PATH = 'mediadata/thumbnails';
    const HEIGHT = 480;
    const WIDTH = 640;
    const PROFILE_UPDATES = 1;
    public static $rules = [
        'comment'    => 'required|string|max:100',
        'media_url'   => 'nullable|integer',
        'user_id' => 'required|integer',
        'privacy' => 'required',
        //        'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
       // 'email'   => 'required|email|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
        //        'gender'   => 'required|integer',
    ];
    
}
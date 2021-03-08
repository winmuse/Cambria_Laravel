<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayjpAccount extends Model
{
    protected $table = 'card_info';

    protected $fillable = ['id','user_id', 'card_number','cvc_number','expiration_year','expiration_month','token']; 
    protected $casts = [
        'id'                        => 'integer',
        'user_id'                   => 'integer',
        'payjp_mail'                => 'string',  
        'payjp_apikey'              => 'string',
        'card_number'               => 'string',
        'cvc_number'                => 'string',
        'expiration_year'           => 'string',
        'expiration_month'          => 'string',
        'token'                     =>'string',
    ];
}
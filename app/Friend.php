<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    //
    
    protected $fillable = [
        'send_id', 'received_id', 'accept',
    ];
}

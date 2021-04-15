<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tripuser extends Model
{
    //
    protected $fillable = ['trip_id', 'user_id', 'kanri_flg','life_flg'];
}

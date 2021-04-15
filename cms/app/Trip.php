<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable = ['title', 'departure', 'arrival','days','description','fname','author_id'];
    public function user_id()
    {
        return $this->belongsTo('App\User','author_id');
    }
    
    // public function tripusers()
    // {
    //     return $this->hasMany('App\Tripuser','trip_id');
    // }
    
    public function users()
    {
        return $this->belongsToMany('App\User','tripusers');
    }
}

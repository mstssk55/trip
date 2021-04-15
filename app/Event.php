<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = ['startdate','starttime','enddate','endtime', 'trip_id','tripplan_id'];
    
    public function tripplan()
    { 
    return $this->belongsTo('App\Tripplan','tripplan_id');
    }

}

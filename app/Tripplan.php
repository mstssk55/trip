<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tripplan extends Model
{
    //
    
    protected $fillable = ['trip_id', 'category_id','plan', 'text', 'user_id', 'kanri_flg'];
    
    public function plancategory()
    {
        return $this->belongsTo('App\Plancategory','category_id');
        return $this->belongsTo('App\User','user_id');
    }
    public function planuser()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function plan_event()
    {
        return $this->hasOne('App\Event','tripplan_id');
    }
    
    
    
    protected $dates = [
        'start',
        'end'
    ];

}

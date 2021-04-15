<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','userid','birthday','age','gender','address','icon','life_flg',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function friends()
    {
        return $this->belongsToMany('App\User', 'friends', 'send_id', 'received_id');
    }
    
    function oppsite_friends()
    {
        return $this->belongsToMany('App\User', 'friends', 'received_id', 'send_id');
    }
    
    public function trips()
    {
        return $this->belongsToMany('App\Trip','tripusers');
    }
}

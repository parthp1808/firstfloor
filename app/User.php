<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function properties_listed(){
        return $this->hasMany(Property::class);
    }

    public function searches(){
        return $this->hasMany(UserSearch::class);
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Property::class);
    }


}

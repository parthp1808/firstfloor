<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSearch extends Model
{
    protected $fillable = ['user_id', 'name','url'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function property_photos()
    {
        return $this->hasMany(PropertyPhoto::class);
    }

    public function features()
    {
    	return $this->belongsToMany(Feature::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function bookmarkers()
    {
        return $this->belongsToMany(User::class);
    }
}

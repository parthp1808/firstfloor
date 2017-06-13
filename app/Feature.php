<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public function properties()
    {
    	return $this->belongsToMany(Property::class);
    }
}

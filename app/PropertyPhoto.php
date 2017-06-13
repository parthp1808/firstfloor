<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyPhoto extends Model
{

    protected $fillable = ['property_id', 'filename'];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twine extends Model
{
    /* Relationship Methods */
    public function type() {
        # Twine belongs to Type
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Type');
    }

    public function starter() {
        # Twine belongs to Starter
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Starter');
    }

    public function strand()
    {
        # Twine has many Strands
        # Define a one-to-many relationship.
        return $this->hasMany('App\Strand');
    }

}

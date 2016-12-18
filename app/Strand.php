<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    # Strand belongs to Twine
    # Define an inverse one-to-many relationship.
    public function twine() {//removed s from twines
        return $this->belongsTo('App\Twine');
    }
    # Strand belongs to Element
    # Define an inverse one-to-many relationship.

    public function element() { //removed s from elements
        return $this->belongsTo('App\Element'); //removed s from Elements
    }
}

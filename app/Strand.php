<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    # Strand belongs to Twine
    # Define an inverse one-to-many relationship.
    public function twines() {
        return $this->belongsTo('App\Twine');
    }
    # Strand belongs to Element
    # Define an inverse one-to-many relationship.
    public function elements() {
        return $this->belongsTo('App\Element');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    public function strands() {
        # Element has many Strands
        # Define a one-to-many relationship.
        return $this->hasMany('App\Strand');
    }
}

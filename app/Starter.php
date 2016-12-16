<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Starter;

class Starter extends Model
{
    /* Relationship Methods */
    public function twines() {
        # Starter has many Twines
        # Define a one-to-many relationship.
        return $this->hasMany('App\Twine');
    }
    public static function getForDropdown() {

        # Starter
        $starters = Starter::orderBy('starter_text', 'DSC')->get();

        $starters_for_dropdown = [];
        foreach($starters as $starter) {
            $starters_for_dropdown[$starter->id] = $starter->starter_text;
        }

        return $starters_for_dropdown;
    }

}

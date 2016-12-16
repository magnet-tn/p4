<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function twines() {
        # Type has many Twines
        # Define a one-to-many relationship.
        return $this->hasMany('App\Twine');
    }

    public static function getForDropdown() {

        # Type
        $types = Type::orderBy('name', 'DSC')->get();

        $types_for_dropdown = [];
        foreach($types as $type) {
            $types_for_dropdown[$type->id] = $type->name;
        }

        return $types_for_dropdown;
    }
}

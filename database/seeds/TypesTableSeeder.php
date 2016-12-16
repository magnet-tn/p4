<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $typeArray = ['story','poem','play','screenplay','song','joke'];
        foreach($typeArray as $typeName) {
            $type = new Type();
            $type->name = $typeName;
            $type->save();
        }
    }
}

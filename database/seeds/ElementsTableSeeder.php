<?php

use Illuminate\Database\Seeder;
use App\Element;

class ElementsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run()
    {
        $list = ['continue','paragraph','section','chapter','character','scene','aside', 'end'];

        foreach($list as $item) {
            $element = new Element(); //new instance of model
            $element->name = $item; //set name
            $element->save();//invoke save method
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Element;
use App\Twine;

class StrandsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run()
    {
        $faker = Faker::create();

        $element_id = Element::where('Name','=','continue')->pluck('id')->first();

        DB::table('strands')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'element_id' => $element_id,
            'twine_id' => 1,
            'strand_text' => $faker->sentence,
        ]);

        $element_id = Element::where('Name','=','continue')->pluck('id')->first();

        DB::table('strands')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'element_id' => $element_id,
            'twine_id' => 2,
            'strand_text' => $faker->paragraph,
        ]);

        $element_id = Element::where('Name','=','continue')->pluck('id')->first();

        DB::table('strands')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'element_id' => $element_id,
            'twine_id' => 3,
            'strand_text' => $faker->sentence,
        ]);
        $element_id = Element::where('Name','=','continue')->pluck('id')->first();

        DB::table('strands')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'element_id' => $element_id,
            'twine_id' => 2,
            'strand_text' => $faker->sentence,
        ]);

        $element_id = Element::where('Name','=','continue')->pluck('id')->first();

        DB::table('strands')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'element_id' => $element_id,
            'twine_id' => 1,
            'strand_text' => '',
        ]);




    }
}

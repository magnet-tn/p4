<?php

use Illuminate\Database\Seeder;
use App\Type;
use App\Starter;
use Faker\Factory as Faker;

class TwinesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $type_id = Type::where('name','=','story')->pluck('id')->first();
        $starter_id = Starter::where('starter_text','LIKE','%She stared at the cards%')->pluck('id')->first();

        DB::table('twines')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'type_id' => $type_id,
            'title' => 'The Magic Pumpkin',
            'author' => 'Milly Franklin',
            'starter_id' => $starter_id,
        ]);

        $faker = Faker::create();
        $type_id = Type::where('name','=','poem')->pluck('id')->first();
        $starter_id = Starter::where('starter_text','LIKE','%Celebrate now, ye distracted%')->pluck('id')->first();

        $date1 = $faker->dateTime($max = 'now');
        $date2 = $faker->dateTime($max = 'now');
        $date1 = (($date1 < $date2)) ? $date2 : $date1;

        DB::table('twines')->insert([
            'created_at' => $date1,
            'updated_at' => $date2,
            'type_id' => $type_id,
            'title' => 'Viscera',
            'author' => 'Jack Crawford',
            'starter_id' => $starter_id,
        ]);

        $faker = Faker::create();
        $type_id = Type::where('name','=','story')->pluck('id')->first();
        $starter_id = Starter::where('starter_text','LIKE','%Though I was ready to fight dirty%')->pluck('id')->first();

        $date1 = $faker->dateTime($max = 'now');
        $date2 = $faker->dateTime($max = 'now');
        $date1 = (($date1 < $date2)) ? $date2 : $date1;

        DB::table('twines')->insert([
            'created_at' => $date1,
            'updated_at' => $date2,
            'type_id' => $type_id,
            'title' => 'Hell is Not Too Late',
            'author' => 'Janice Givers',
            'starter_id' => $starter_id,
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class TwinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::table('twines')->insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'type' => 'story',
             'title' => 'The Magic Pumpkin',
             'author' => 'Milly Franklin',
             'strand' => 'It was the best of fish, it was the worst of fish.',
         ]);

         DB::table('twines')->insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'type' => 'poem',
             'title' => 'Viscera',
             'author' => 'Jack Crawford',
             'strand' => 'Celebrate now, ye distracted folk,',
         ]);

         DB::table('twines')->insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'type' => 'story',
             'title' => 'Hell is Not Too Late',
             'author' => 'Janice Givers',
             'strand' => 'Though I was ready to fight dirty, he lay down his own pistol and knife.',
         ]);
     }
}

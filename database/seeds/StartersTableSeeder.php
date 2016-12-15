<?php

use Illuminate\Database\Seeder;

class StartersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('starters')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'starter_text' => 'She stared at the cards spread before her: moon, cup, queen, pentacle, and tried to determine how she should choose.',
            'contributor' => 'Shannon Molloy',
        ]);

        DB::table('starters')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'starter_text' => 'There were sparkles in her eyes and glitter in her hair as a single tear streamed down her cheek.',
            'contributor' => 'Shannon Molloy',
        ]);

        DB::table('starters')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'starter_text' => 'She was consumed with self-doubt as, on paper, he was repugnant to her but, yet, her icy feelings melted in his presence. Has she fallen prey to him, she needed to know.',
            'contributor' => 'Steven Narro',
        ]);

        DB::table('starters')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'starter_text' => 'It was the best of fish, it was the worst of fish.',
            'contributor' => 'Magus Fib',
        ]);

        DB::table('starters')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'starter_text' => 'Celebrate now, ye distracted folk,',
            'contributor' => 'Magus Fib',
        ]);

        DB::table('starters')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'starter_text' => 'Though I was ready to fight dirty, he lay down his own pistol and knife.',
            'contributor' => 'Magus Fib',
        ]);

    }
}

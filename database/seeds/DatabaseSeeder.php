<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ElementsTableSeeder::class);
        $this->call(StartersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(TwinesTableSeeder::class);
        $this->call(StrandsTableSeeder::class);//this was second, now I am putting it last
        $this->call(TwineUserTableSeeder::class);
    }
}

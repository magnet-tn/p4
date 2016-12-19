<?php

use Illuminate\Database\Seeder;
use App\Twine;
use App\User;

class TwineUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
 {

     # First, create an array of all the twines we want to associate users with
     # The *key* will be the twine title, and the *value* will be an array of users.
     $twines =[
         'The Magic Pumpkin' => ['jill','jamal','jackie'],
         'Viscera' => ['jill','jamal','thomas'],
         'Hell is Not Too Late' => ['jill','jackie']
     ];

     # Now loop through the above array, creating a new pivot for each twine to user
     foreach($twines as $title => $users) {

         # First get the twine
         $twine = Twine::where('title','like',$title)->first();

         # Now loop through each user for this twine, adding the pivot
         foreach($users as $userName) {
             $user = User::where('name','LIKE',$userName)->first();

             # Connect this user to this twine
             $twine->users()->save($user);
         }

     }
 }
}

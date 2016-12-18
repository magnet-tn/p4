<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Twine;
use Illuminate\Support\Str;
use App\Starter;
use App\Type;
use App\Helpers\Helper;
use Faker\Factory as Faker;




class TestingController extends Controller
{
    public function example22() {
        # Eager load the starter with the twine
        $twines = Twine::with('strands')->get();

        foreach($twines as $twine) {
            echo "the twine: ".$twine->title.'<br> starts with: '.$twine->strand->strand_text.' <br/>';
        }

        dump($twines->toArray());
    }

    /**
    * Test id finder
    **/
    public function example21() {

        $twine_id = Twine::where('id', 2)->first();
        dump($twine_id);

    }
    /**
    * Test Faker
    **/
    public function example20() {

        $faker = Faker::create();
        $title = $faker->catchPhrase;
        $strand = $faker->paragraph;
        $created_at = $faker->dateTime($max = 'now');
        $updated_at = $faker->dateTime($max = 'now');
        $created_at = (($created_at < $updated_at)) ? $updated_at : $created_at;
        dump($title);
        dump($strand);
        dump($updated_at);
        dump($created_at);
    }

    /**
    * Query with Eager Loading - reduces excess queries
    **/
    public function example19() {
        # Eager load the starter with the twine
        $twines = Twine::with('starter')->get();

        foreach($twines as $twine) {
            echo "the twine: ".$twine->title.'<br> starts with: '.$twine->starter->starter_text.' <br/>';
        }

        dump($twines->toArray());
    }


    /**
    * Query with relationship - Note two queries not just one
    **/
    public function example18() {
        # Get the first twine as an example
        $twine = Twine::where('id', '=', 2)->first();

        # Get the starter from this twine using the "starter" dynamic property
        # "starter" corresponds to the the relationship method defined in the Twine model
        $starter = $twine->starter;//results in another (the second) Query
        #with () would be the relationship like in example 16
        #without () [used here] is invoking a dynamic relationship property.
        $strands = $twine->strands;

        # Output
        dump($twine->title.' incudes this starter: '.$starter->starter_text);
        dump($twine->toArray());

        #$strands = $strands->toArray();
        dump($strands);
        foreach ($strands as $key => $value) {
            dump($value->strand_text);
        }
    }


    /**
    * Test helper function - Titlecase
    **/
    public function example17() {

        $string = "What do you expect, and when do you want me to do it?";
        $string = Helper::Titlecase($string);
        dump($string);
    }
    /**
    * Associate extant Starter and extant Type with a new Twine
    **/
    public function example16() {

        #This is the critical example of joins to get associated table info.
        #This essential says set the foreign key to be the appropriate id of the row in table we're connecting to.

        # To do this, we'll fetch a starter:
        $starter = Starter::where(
            'starter_text', '=', "\"No, that was different,\" I told him. \"Back then I didn't know how to pack a suitcase.\"")
            ->first();
            dump($starter->toArray());

            # Now we'll fetch a type:
            $type = Type::where('name','=','story')->first();
            dump($type->toArray());

            # Then we'll create a new twine and associate it with the starter:
            $twine = new Twine;
            $twine->title = "The Glass Box";
            $twine->author = 'Jill';
            $twine->starter()->associate($starter); # <--- Associate the starter with this twine
            $twine->type()->associate($type); # <--- Associate the type with this twine
            $twine->save();
            dump($twine->toArray());
        }
        /**
        * Create new starter,
        * Associate new starter with extant type
        * Create new twine
        * And Connect new starter and extant type to new Twine
        **/
        public function example15() {

            # To do this, we'll first create a new starter:
            $starter = new Starter;
            $starter->starter_text = "\"No, that was different,\" I told him. \"Back then I didn't know how to pack a suitcase.\"";
            $starter->contributor = 'Magus Fib';
            $starter->save();
            dump($starter->toArray());

            # Now we'll fetch a type:
            $type = Type::where('name','=','song')->first();
            dump($type->toArray());

            # Then we'll create a new twine and associate it with the starter:
            $twine = new Twine;
            $twine->title = "The Glass Box";
            $twine->author = 'Jill';
            $twine->starter()->associate($starter); # <--- Associate the starter with this twine
            $twine->type()->associate($type); # <--- Associate the type with this twine
            $twine->save();
            dump($twine->toArray());
        }

        /**
        * COLLECTIONS - using object notation, same result as example 13
        **/
        public function example14() {

            $twines = Twine::all();

            foreach($twines as $twine) {
                echo $twine->title."<br>";//treating it as an object
            }
            echo '<br/>';
            foreach($twines as $twine) {
                echo $twine['title']."<br>";//treating it as an array
            }
        }
        /**
        * COLLECTIONS - treat it like an array to get at the data
        **/
        public function example13() {

            $twines = Twine::all();

            # loop through the Collection and access just the data
            foreach($twines as $twine) {
                echo $twine['type']."<br>";
            }
        }
        /**
        * COLLECTIONS - echo object $twine
        **/
        public function example12() {

            $twine = Twine::all(); //$twine is a Collection - containing array of data and methods.
            dump($twine);
            echo $twine; //Returns just an array representing the table data, why?
            //because there is a magic method caled __toString which takes just the data and converts it to JSON
        }
        /**
        * ORM DELETE using the Twine model
        **/
        public function example11() {
            # First get a twine to delete
            $twine = Twine::where('starter', 'LIKE', '%McSnoopy%')->first();

            # If we find a twine, delete it
            if($twine) {

                $foundTwineId = $twine->id;
                # simple delete, note it is like save.
                $twine->delete();

                return "Deletion complete <br/> Twine id#: "
                .$twine->id.'<br/> gone. <em>'
                .$twine->title.'</em> is gone';

            }
            else {
                return "Can't delete - twine not found.";
            }
        }
        /**
        * ORM UPDATE using the Twine model
        **/
        public function example10() {

            # First get a twine to update
            $twine = Twine::where('title', 'LIKE', '%Hell%')->first();

            # If we found the twine, update it
            if($twine) {

                # Give it a different title
                $twine->title = 'Hell Can Be Dispiriting';
                # or
                $twine->title = Str::title('hell CAN Be Dispiriting');


                # Save the changes
                $twine->save();

                echo "Update complete <br/> Twine id#: "
                .$twine->id.'<br/> is now named: <em>'
                .$twine->title.'</em>';
            }
            else {
                echo "Twine not found, can't update.";
            }

        }
        /**
        * ORM READ using the Twine model
        **/
        public function example9() {

            # Two methods to do this:
            # Method 1:
            $twines = Twine::all();

            #Method 2:
            // $twine = new Twine();
            // $twines = $twine->all();

            dump($twines);
            # Make sure we have results before trying to print them...
            if(!$twines->isEmpty()) {

                # Output the twines
                foreach($twines as $twine) {
                    echo $twine->title.'<br>';
                }
            }
            else {
                echo 'No twines found';
            }
        }

        /**
        * ORM CREATE using the Twine model
        **/
        public function example8() {

            # Instantiate a new twine Model object
            $twine = new Twine();

            # Set the parameters to fill fields on twines table
            $twine->type = 'poem';
            $twine->title = 'Pencil Fighting';
            $twine->starter = 'Jeeves McSnoopy';
            $twine->strand = 'It was a dark and stormy night,';

            # Invoke Eloquent save() method: create new row in `twines` table
            $twine->save();

            echo 'Added: '.$twine->title;
        }
        /**
        *DB UPDATE example using QueryBuilder
        */
        public function example7() {
            #Option 1 and 2 do the same thing
            #Option 1
            $twine = DB::table('twines')->where('id', 2)
            ->update(['title' => 'Visceral Reaction']);
            #Option 2
            // $twine = DB::table('twines')->where('id', 2);
            // $twine = $twine->update(['title' => 'New Visceral Reaction']);

            # this makes is the way i found to print the new title.
            $twine = DB::table('twines')->find(2);
            echo $twine->title.'<br/>';//this is object syntax (go into the twine object and field title)
        }
        /**
        *DB CREATE example using QueryBuilder
        */
        public function example6() {
            # Use the QueryBuilder to insert a new row into the twines table
            # i.e. create a new twine
            DB::table('twines')->insert([
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                'type' => 'story',
                'title' => 'Explosive Icing',
                'starter' => 'Mel Kirkoff',
                'strand' => 'The wind that came from the explosion was beyond icy. No one had yet documented such a freak reaction from a terrestrial source.',
            ]);
            return 'twine added to twines table';
        }
        /**
        *DB READ example using QueryBuilder
        */
        public function example5() {
            # Use the QueryBuilder to get all the twines
            $twines = DB::table('twines')->get();

            # Output the results
            foreach ($twines as $twine) {
                echo $twine->title.'<br/>';
            }
        }
        /**
        *
        */
        public function example4() {
            return view('greeting', ['name' => 'James']);
        }
        /**
        *
        */
        public function example3() {
            echo \App::environment();
            echo 'App debug:  '.config('app.debug');
        }
        /**
        *
        */
        public function example2() {
            $fruits = ['pineapple', 'orange', 'kiwi'];
            dd($fruits);
        }

        /**
        *
        */
        public function example1() {
            return 'This is the example 1';
        }

    }

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;

class TestingController extends Controller
{
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
        echo $twine->title.'<br/>';
    }
    /**
    *DB CREATE example using QueryBuilder
    */
    public function example6() {
        # Use the QueryBuilder to insert a new row into the books table
        # i.e. create a new book
        DB::table('twines')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'type' => 'story',
            'title' => 'Explosive Icing',
            'author' => 'Mel Kirkoff',
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

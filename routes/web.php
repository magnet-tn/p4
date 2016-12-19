<?php

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | This file is where you may define all of the routes that are handled
    | by your application. Just tell Laravel the URIs it should respond
    | to using a Closure or controller method. Build something great!
    |
    */

    Route::get('/twines', 'TwineController@index')->name('twines.index');

    # Show a form to create a new twine
    Route::get('/twines/create', 'TwineController@create')->name('twines.create')->middleware('auth');

    # Process the form to create a new twine
    Route::post('/twines', 'TwineController@store')->name('twines.store');

    # Show an individual twine
    Route::get('/twines/{id}', 'TwineController@show')->name('twines.show');

    # Show form to edit a twine
    Route::get('/twines/{id}/edit', 'TwineController@edit')->name('twines.edit');

    # Process form to edit a twine
    Route::put('/twines/{id}', 'TwineController@update')->name('twines.update');

    # Get route to confirm deletion of twine
    Route::get('/twines/{id}/delete', 'TwineController@delete')->name('twines.destroy');

    # Delete route to actually destroy the twine
    Route::delete('/twines/{id}', 'TwineController@destroy')->name('twines.destroy');

    /**
    * Misc Pages
    */
    Route::get('/help', 'PageController@help')->name('page.help');
    Route::get('/about', 'PageController@about')->name('page.about');

    Route::get('/testing', 'TestingController@index')->name('testing.index');
    for($i = 0; $i < 30; $i++) {
        Route::get('/testing/'.$i, 'TestingController@example'.$i)->name('testing.example'.$i);
    }

    Route::get('/status', 'TestingController@loginStatus')->name('loginStatus');

    /**
    * ref: https://github.com/susanBuck/dwa15-fall2016-notes/blob/master/03_Laravel/21_Schemas_and_Migrations.md#starting-overyour-first-migrations
    * To allow for a total refresh for development ONLY
    */
    if(App::environment('local')) {
        Route::get('/drop', function() {
            DB::statement('DROP database p4');
            DB::statement('CREATE database p4');
            return 'Dropped p4; created p4.';
        });
    };

    if(App::environment() == 'local') {
        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    }


    /**
    * Development related
    * Testing DB connection - Lecture 9 Part 3 Video
    */
    # Make it so the logs can only be seen locally
    Route::get('/debug', function() {

        echo '<pre>';

        echo '<h1>Environment</h1>';
        echo App::environment().'</h1>';

        echo '<h1>Debugging?</h1>';
        if(config('app.debug')) echo "Yes"; else echo "No";

        echo '<h1>Database Config</h1>';
        /*
        The following line will output your MySQL credentials.
        Uncomment it only if you're having a hard time connecting to the database and you
        need to confirm your credentials.
        When you're done debugging, comment it back out so you don't accidentally leave it
        running on your live server, making your credentials public.
        */
        //print_r(config('database.connections.mysql'));

        echo '<h1>Test Database Connection</h1>';
        try {
            $results = DB::select('SHOW DATABASES;');
            echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
            echo "<br><br>Your Databases:<br><br>";
            print_r($results);
        }
        catch (Exception $e) {
            echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
        }

        echo '</pre>';

    });

    Route::get('/', 'PageController@welcome')->name('page.welcome');

Auth::routes();

Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index');

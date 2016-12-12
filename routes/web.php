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
Route::get('/twines/create', 'TwineController@create')->name('twines.create');

# Process the form to create a new twine
Route::post('/twines', 'TwineController@store')->name('twines.store');

# Show an individual twine
Route::get('/twines/{id}', 'TwineController@show')->name('twines.show');

# Show form to edit a twine
Route::get('/twines/{id}/edit', 'TwineController@edit')->name('twines.edit');

# Process form to edit a twine
Route::put('/twines', 'TwineController@update')->name('twines.update');

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
for($i = 0; $i < 20; $i++) {
    Route::get('/testing/'.$i, 'TestingController@example'.$i)->name('testing.example'.$i);
}

if(App::environment() == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

Route::get('/', 'PageController@welcome')->name('page.welcome');

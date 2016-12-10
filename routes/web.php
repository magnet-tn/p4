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
Route::get('/twines/{title}', 'TwineController@show')->name('twines.show');

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
Route::get('/faq', 'PageController@faq')->name('page.faq');

Route::get('/testing', 'TestingController@index')->name('testing.index');
for($i = 0; $i < 10; $i++) {
    Route::get('/testing/'.$i, 'TestingController@example'.$i)->name('testing.example'.$i);
}

if(App::environment() == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}


Route::get('/', function () {
    return view('welcome');
});

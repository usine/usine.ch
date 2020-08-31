<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/contact', function () {
    $venues = App\Venue::orderBy('name')->get();

    return view('contact', compact('venues'));
})->name('contact');

Route::resource('espaces', 'VenueController', ['names' => 'venues'])->only(['index', 'show'])->parameters([
    'espaces' => 'venue',
]);

Route::resource('agenda', 'EventController', ['names' => 'events'])->parameters([
    'agenda' => 'event',
]);

Route::resource('blas', 'BlaController')->only(['index', 'show']);

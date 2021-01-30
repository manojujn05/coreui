<?php

use App\Theater;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/theater', 'TheaterController@index')->name('theater');

Route::get('/create_theater', function () {
    return view('theaters.add');
});

Route::get('/theater/{id}', function ($id) {
    $theater = Theater::Findorfail($id);
    return view('theaters.show', compact('theater'));
});

Route::post('/save_theater', 'TheaterController@store')->name('save_theater');
Route::post('/editTheater', 'TheaterController@update')->name('theater.edit');
Route::get('/theater-delete/{id}', 'TheaterController@delete')->name('theater-delete');

Route::get('/packages', 'PackageController@index')->name('package');
Route::get('/package-delete/{id}', 'PackageController@delete')->name('package-delete');
Route::get('/create_package', function () {
    return view('packages.add');
});
Route::post('/save_package', 'PackageController@store')->name('save_package');
Route::get('/theatertype', 'TheatertypesController@index')->name('theatertype');
Route::get('/create_theatertype', function () {
    return view('theater_type.add');
});

<?php

use App\Theater;
use App\Merchant;
use App\Package;
use App\Theatertype;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/theater', 'TheaterController@index')->name('theater');

Route::get('/create_theater', function () {
    $theatertype = Theatertype::get();
    return view('theaters.add', compact('theatertype'));
});

Route::get('/theater/{id}', function ($id) {
    $theater = Theater::Findorfail($id);
    return view('theaters.show', compact('theater'));
});

Route::post('/save_theater', 'TheaterController@store')->name('save_theater');
Route::post('/editTheater', 'TheaterController@update')->name('theater.edit');
Route::get('/theater-delete/{id}', 'TheaterController@delete')->name('theater-delete');

Route::get('/packages', 'PackageController@index')->name('package');

Route::get('/packages/{id}', function ($id) {
    $theater = Package::Findorfail($id);
    return view('packages.update', compact('theater'));
});
Route::post('/update-packages', ['uses' => 'PackageController@update', 'as' => 'packages_update']);


Route::get('/package-delete/{id}', 'PackageController@delete')->name('package-delete');
Route::get('/create_package', function () {
    return view('packages.add');
});
Route::post('/save_package', 'PackageController@store')->name('save_package');
Route::get('/theatertype', 'TheatertypesController@index')->name('theatertype');
Route::get('/create_theatertype', function () {
    return view('theater_type.add');
});

Route::post('/save-theatertypes', 'TheatertypesController@store')->name('save_theatertypes');
Route::get('/theatertypes/{id}', function ($id) {
    $theater = Theatertype::Findorfail($id);
    return view('theater_type.show', compact('theater'));
});

Route::post('/update-theatertypes', ['uses' => 'TheatertypesController@update', 'as' => 'theatertypes_update']);
Route::get('/theatertypes-delete/{id}', 'TheatertypesController@delete')->name('theatertypes-delete');


Route::get('/merchant', 'MerchantsController@index')->name('merchant');

Route::get('/create_merchant', function () {
    return view('merchants.add');
});

Route::get('/merchant/{id}', function ($id) {
    $merchant = Merchant::Findorfail($id);
    return view('merchants.show', compact('merchant'));
});

Route::post('/save_merchant', 'MerchantsController@store')->name('merchant.save');
Route::post('/edit_merchant', 'MerchantsController@update')->name('merchant.edit');
Route::get('/merchant-delete/{id}', 'MerchantsController@delete')->name('merchant-delete');

Route::post('/merchant-search', 'MerchantsController@search')->name('merchant-search');
Route::post('/theater-search', 'TheaterController@search')->name('theater-search');

Route::get('/merchant-theater', 'TheaterController@merchant_theater')->name('merchant-theater');
Route::get('/link-merchants', 'TheaterController@link_theater')->name('link-merchants');
Route::post('/save-linking', 'TheaterController@store_merchant_theater')->name('save-linking');

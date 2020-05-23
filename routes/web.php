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

$route_prefix = '/Demo_Laravel_project';

Route::get($route_prefix . '/', function () {
    return view('home');
})->name('home');

Route::get($route_prefix . '/new_client', function () {
    return view('newClient');
})->name('newClient');

Route::get($route_prefix . '/clients', 'OwnerController@index')->name('clients.index');
Route::post($route_prefix . '/clients', 'OwnerController@store')->name('clients.store');
Route::delete($route_prefix . '/clients/{id}', 'OwnerController@destroy')->name('clients.destroy');
Route::put($route_prefix . '/clients/{id}', 'OwnerController@update')->name('clients.update');
Route::get($route_prefix . '/clients/{id}', 'OwnerController@show')->name('clients.show');
Route::post($route_prefix . '/clients/{id}/add_pet', 'OwnerController@show')->name('clients.show.pet');
Route::post($route_prefix . '/clients/{id}/update', 'OwnerController@show')->name('clients.show.update');

Route::post($route_prefix . '/pets', 'PetController@store')->name('pets.store');
Route::delete($route_prefix . '/pets/{id}', 'PetController@destroy')->name('pets.destroy');
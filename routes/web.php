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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/new_client', function () {
        return view('newClient');
    })->name('newClient');

    Route::get('/clients', 'OwnerController@index')->name('clients.index');
    Route::post('/clients', 'OwnerController@store')->name('clients.store');
    Route::delete('/clients/{id}', 'OwnerController@destroy')->name('clients.destroy');
    Route::put('/clients/{id}', 'OwnerController@update')->name('clients.update');
    Route::get('/clients/{id}', 'OwnerController@show')->name('clients.show');
    Route::post('/clients/{id}/add_pet', 'OwnerController@show')->name('clients.show.pet');
    Route::post('/clients/{id}/update', 'OwnerController@show')->name('clients.show.update');

    Route::post('/pets', 'PetController@store')->name('pets.store');
    Route::delete('/pets/{id}', 'PetController@destroy')->name('pets.destroy');
});

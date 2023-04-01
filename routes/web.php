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

Route::get('/', function () {
    return view('auth.register');
});


Auth::routes();

// rotta per pagina dove dice all'utente che la registrazion eè andata a buon fine
Route::get('/admin/success', function () {
    return view('admin.success');
})->name('success');

// rotta per il logout dopo la registrazionee back to login
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware('auth')
    ->namespace('Admin') 
    ->prefix('admin') //localhost:8080/admin tutti gli url così
    ->name('admin.')
    ->group(function(){

        // Route::get('/home', 'HomeController@index')->name('index');
});

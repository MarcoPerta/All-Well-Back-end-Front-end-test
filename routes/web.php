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
         Route::get('/home', 'HomeController@index')->name('index');
});

//rotta per pagina di intermezzo tra inserimento mail e reset password 
Route::get('/password/checkEmail', function () {
    return view('auth.passwords.checkEmail');
})->name('password.checkEmail');

//rotta che porta alla funzione di salvataggio della email e relativo token
Route::post('/password/checkEmail', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('verify.email');



// Pagina di reset password
// Route::get('password/reset/{token}/{email}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


// Pagina di successo
Route::get('/password/success', function () {
    return view('passwords.success');
})->name('password.success');


// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');



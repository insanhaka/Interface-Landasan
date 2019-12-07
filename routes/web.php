<?php

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

/*
Route::get('/', function () {
    return view('auth.login');
});
*/

Route::get('/', function () {
    return view('dashboard');
});

//Route::get('/setting', 'PengaturanController@masuksetting');

Route::group(['middleware' => 'auth'], function()
{
	Route::get('/pengaturan', 'PengaturanController@index')->name('pengaturan');
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/register', 'AuthController@register');
	Route::get('/logout', 'AuthController@logout');
	Route::post('/insertbatasan', 'PengaturanController@insertbatasan');
	Route::post('/insertadmin', 'AuthController@insertadmin');
	Route::get('/admin/{id}/hapus', 'AuthController@hapusadmin');
	Route::post('/insertalarm', 'PengaturanController@insertalarm');
	Route::get('/print', 'PrintController@datapage');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('data-sensor', 'SensorController@dataSensor');
Route::get('batasan', 'PengaturanController@dataBatasan');
Route::get('alarm', 'PengaturanController@dataAlarm');
Route::get('data-print', 'PrintController@dataPrint');

<?php

use App\Http\Controllers\DosenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resources(['matkul'=> 'MatkulController', 'dosen'=> 'DosenController','mahasiswa'=>'MahasiswaController']);
Route::get('getmatkul/{id}', ['uses' => 'MatkulController@getById']);
Route::get('getdosen/{nip}', ['uses' => 'DosenController@getById']);
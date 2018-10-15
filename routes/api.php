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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('account', 'AccountController');
Route::resource('index', 'IndexController');
Route::post('login', 'LoginController@login');
Route::post('begin', 'LoginController@begin');
Route::post('song', 'SongController@createSong');
Route::get('list_song', 'SongController@listSong');
Route::post('your_song', 'SongController@yourSong');
Route::post('post_detail_song', 'SongController@postDetailSong');


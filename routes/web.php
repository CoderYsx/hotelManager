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

Route::get('/', function () {
    return view('welcome');
});

//第一个
Route::get('/getRoom','Ysh\getRoomController@getRoom');
Route::get('/getUpdateInfo','Ysh\getRoomController@getUpdateInfo');
Route::post('/updateRoom','Ysh\getRoomController@updateInfo');
Route::get('/getSRoom','Ysh\getRoomController@getSearchroom');

//第二个
Route::get('/getRoomInfo','Ysh\RoomInfoController@getRoomInfo');
Route::get('/updateRoomInfo','Ysh\RoomInfoController@UpdateRoomInfo');

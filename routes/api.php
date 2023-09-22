<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//登入判斷是否已綁定
Route::post('login', 'API\transferPageController@login');
//帳號綁定
Route::post('cabal_login', 'API\transferPageController@cabal_login');
// 刪除序號
Route::post('del_serial', 'API\w@delSerial');
//事前預約
Route::post('prereg_api', 'API\preregController@index');
// 兌換序號
Route::post('exchange', 'API\frontController@exchange');
// 領獎
Route::post('gift', 'API\frontController@gift');
// 更新平台新聞
Route::post('digeamIndexNews', 'API\DigeamController@IndexNews')->name('IndexNews');


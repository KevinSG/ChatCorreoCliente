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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::post('forgot-password', 'UserController@forgotPassword');
Route::post('reset-password', 'UserController@resetPassword');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'v1'], function () {

	Route::get('user-list', 'PrivateMessageController@getUserList');

    Route::post('get-private-message-notifications', 'PrivateMessageController@getUserNotifications');
    Route::post('get-private-messages/{id}', 'PrivateMessageController@getPrimateMessages');
    Route::post('get-private-message/{id}', 'PrivateMessageController@getPrivateMessageById');
    Route::post('get-private-messages-sent/{id}', 'PrivateMessageController@getPrivateMessageSent');
    Route::post('send-private-message', 'PrivateMessageController@sendPrivateMessage');
});
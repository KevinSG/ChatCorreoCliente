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



Route::get('test', function (){
	return App\PrivateMessage::where('id', 1)->first();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::middleware(["auth"])->group( function(){

    Route::get('/index', function () {
    	// $user = Auth::user();
	    return view('index');
	});

	// Route::get('/enviados', function () {
	// 	$user = Auth::user();
	//     return view('chat/enviados', compact('user'));
	// });
	Route::get('/enviar', function () {
		// $user = Auth::user();
	    return view('chat/enviar');
	});
	Route::get('/detalles/{id}', function ($id) {
		// $user = Auth::user();
	    return view('chat/detalles',compact('id'));
	});
// });
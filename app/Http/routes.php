
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::auth();

Route::group(['prefix'=>'account','middleware'=> ['web','auth']], function(){



     Route::get('/', 'AccountController@show');

     Route::get('/shops', 'AccountShopsController@show');
     Route::get('/shops/delete/{id}', 'AccountShopsController@delete');
     Route::post('/shops/update/{id}', 'AccountShopsController@update')->name('shops.update');
     Route::post('/shops/create', 'AccountShopsController@create');
     Route::get('/shops/create/cform', ['uses'=>'CUFormController@createForm','as'=>'sccf']);

     Route::get('/shops/upd/uform/{id}', 'CUFormController@updateForm');

     Route::get('/profile', 'AccountPrifileController@show');
     Route::get('/messages', 'AccountMessagesController@show');

 });



//Route::get('/home', 'HomeController@index'); // личный кабинет

<?php

Route::get('/', 'ContactController@index');

Route::group(['middleware' => ['web']], function ()
{
	Route::resource('contact', 'ContactController');
});

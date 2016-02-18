<?php

Route::group(['middleware' => ['web']], function ()
{
	Route::resource('contact', 'ContactController');
});

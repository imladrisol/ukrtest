<?php

Route::resource('user', 'UserController');

Route::get('user/{id}/restore', ['as'=>'user.restore', 'uses'=>'UserController@restore']);
Route::get('user/{id}/deltrash', ['as'=>'user.delTrash', 'uses'=>'UserController@delTrash']);
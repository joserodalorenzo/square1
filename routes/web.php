<?php


Route::get('/', 'PageController@inicio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/', 'PageController@fechas')->name('fecha.crear');

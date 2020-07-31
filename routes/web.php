<?php

Route::get('/','SiteController@Home');
Route::get('/entrar','SiteController@Login');
Route::get('/registro','SiteController@Register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

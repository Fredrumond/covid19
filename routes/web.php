<?php

Route::get('/','SiteController@Home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

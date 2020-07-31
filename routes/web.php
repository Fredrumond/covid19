<?php

Route::get('/','SiteController@Home');

Auth::routes();

Route::get('/home', 'HomeController@Index')->name('home');
Route::get('/details-coutry/{Country}/{Days?}', 'HomeController@ShowDetailsCountrie')->name('details-coutry');

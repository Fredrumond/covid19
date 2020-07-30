<?php

Route::get('/','SiteController@Home');
Route::get('/entrar','SiteController@Login');
Route::get('/registro','SiteController@Register');

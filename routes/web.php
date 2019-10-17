<?php

Route::get('/', [
    'uses' => 'IndexController@index',
    'as' => 'index.welcome'
]);

Route::get('/universidad/{universityName}', [
    'uses' => 'IndexController@index',
    'as' => 'index.welcome.universidad'
]);

Route::get('/universidades/all', [
    'uses' => 'HelperController@getImagenesCollection',
    'as' => 'helper.images'
]);

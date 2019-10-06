<?php

Route::get('/', [
    'uses' => 'IndexController@index',
    'as' => 'index.welcome'
]);

Route::get('/universidades/all', [
    'uses' => 'HelperController@getImagenesCollection',
    'as' => 'helper.images'
]);

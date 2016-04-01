<?php

Route::get('/', 'HomeController@index');

// Clan routes
Route::get('/clans', 'ClanController@index');
Route::get('/clans/search', 'ClanController@getSearchClans');
Route::post('/clans/addClan', 'ClanController@postAddClan');
Route::get('/clans/searchClanResults', 'ClanController@getSearchClanResults');
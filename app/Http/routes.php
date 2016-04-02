<?php

Route::get('/', 'HomeController@index');

// Clan routes
Route::get('/clans', 'ClanController@index');
Route::get('/clans/search', 'ClanController@getSearchClans');
Route::get('/clans/searchClanResults', 'ClanController@getSearchClanResults');
Route::get('/clans/save', 'ClanController@getSaveClan');
Route::get('/clans/view/{tag}', 'ClanController@viewClan');
Route::get('/clans/search/members', 'ClanController@getSearchClanMembers');
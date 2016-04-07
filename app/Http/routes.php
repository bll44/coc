<?php

Route::get('/', 'HomeController@index');

// Clan routes
Route::get('/clans', 'ClanController@index');
Route::get('/clans/search', 'ClanController@getSearchClans');
Route::get('/clans/searchClanResults', 'ClanController@getSearchClanResults');
Route::get('/clans/save', 'ClanController@getSaveClan');
Route::get('/clans/view/{tag}', 'ClanController@viewClan');
Route::get('/clans/members/save', 'ClanController@getSaveClanMembers');

// Member routes
Route::get('/members', 'MemberController@index');
Route::get('/members/list/{tag}', 'MemberController@viewMembersByClan');

// Admin routes
Route::get('/admin', 'AdminController@index');
Route::get('/admin/refresh_clans', 'AdminController@refreshClans');
Route::get('/admin/refresh_leagues', 'AdminController@refreshLeagues');
Route::get('/admin/refresh_locations', 'AdminController@refreshLocations');

Route::get('insert', function() {
	DB::insert("insert into clans values (5, '#YVUV92X', 'the clan', 'test', 'a description',
							'2900', 'badge small', 'badge medium', 'badge large',
                            'always', 10, 50, 10, 1000, 2000, 30, NOW(), NOW())");
	return 'inserted';
});
<?php

Route::get('/', 'HomeController@index');

// Clan routes
Route::get('/clans', 'ClanController@index');
Route::get('/clans/searchClanResults', 'ClanController@getSearchClanResults');
Route::get('/clans/save', 'ClanController@getSaveClan');
Route::get('/clans/view/{tag}', 'ClanController@viewClan');
Route::get('/clans/members/save', 'ClanController@getSaveClanMembers');
Route::get('/clans/donation_data', 'ClanController@getDonationData');

// Member routes
Route::get('/members', 'MemberController@index');
Route::get('/members/list/{tag}', 'MemberController@viewMembersByClan');

// Admin routes
Route::get('/admin', 'AdminController@index');
Route::get('/admin/index', 'AdminController@index');
Route::get('/admin/refresh_clans', 'AdminController@refreshClans');
Route::get('/admin/refresh_leagues', 'AdminController@refreshLeagues');
Route::get('/admin/refresh_locations', 'AdminController@refreshLocations');
Route::get('/admin/login', 'AdminController@getAdminLogin');
Route::post('/admin/login', 'AdminController@postAdminLogin');
Route::get('/admin/create_admin_account', ['middleware' => 'admin', 'AdminController@getCreateAdminAccount']);
Route::post('/admin/create_admin_account', ['middleware' => 'admin', 'AdminController@postCreateAdminAccount']);
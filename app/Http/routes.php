<?php

// Clan routes
Route::get('/', 'ClanController@index');
Route::get('/clans', 'ClanController@index');
Route::get('/clans/index', 'ClanController@index');
Route::get('/clans/search', 'ClanController@getClanSearchResults');
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
Route::group(['middleware' => 'admin'], function() {
	Route::get('/admin/logout', 'AdminController@logout');
	Route::get('/admin/create_admin_account', 'AdminController@getCreateAdminAccount');
	Route::post('/admin/create_admin_account', 'AdminController@postCreateAdminAccount');

	// Profile
	Route::get('/admin/profile/{username}', 'AdminController@getViewUserProfile');
});
<?php

Route::get('/', 'HomeController@index');

// Clan routes
Route::get('/clans', 'ClanController@index');
Route::get('/clans/search', 'ClanController@getSearchClans');
Route::post('/clans/addClan', 'ClanController@postAddClan');
Route::get('/clans/searchClanResults', 'ClanController@getSearchClanResults');


Route::get('curl', function() {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.clashofclans.com/v1/clans/%23YVUV92R');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Accept: application/json',
		'authorization: Bearer ' . env('API_KEY')
	));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	return $result;
});


Route::get('test2', function() {
	$curl = new \anlutro\cURL\cURL;
	$request = $curl->newJsonRequest('GET', 'https://api.clashofclans.com/v1/clans/%23YVUV92R', array())
									->setHeader('authorization', 'Bearer ' . env('API_KEY'));
	$response = $request->send();
	$decoded = json_decode($response, true);
	return $decoded;
});
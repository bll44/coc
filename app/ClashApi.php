<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Clan;

class ClashApi extends Model
{
	private $curl;

	public function __construct()
	{
		$this->curl = new \anlutro\cURL\cURL;
	}

	public function getClanByTag($tag)
	{
		$request = $this->curl->newJsonRequest('GET', 'https://api.clashofclans.com/v1/clans/%23YVUV92R', array())
									->setHeader('authorization', 'Bearer ' . env('API_KEY'));
		$response = $request->send();
		$dcd = json_decode($response, true);

		$clan = new Clan;

		$clan->tag = $dcd['tag'];
		$clan->name = $dcd['name'];
		$clan->type = $dcd['type'];
		$clan->description = $dcd['description'];
		$clan->location_id = $dcd['location']['id'];
		$clan->badge_small = $dcd['badgeUrls']['small'];
		$clan->badge_medium = $dcd['badgeUrls']['medium'];
		$clan->badge_large = $dcd['badgeUrls']['large'];
		$clan->warFrequency = $dcd['warFrequency'];
		$clan->clanLevel = $dcd['clanLevel'];
		$clan->warWins = $dcd['warWins'];
		$clan->warWinStreak = $dcd['warWinStreak'];
		$clan->clanPoints = $dcd['clanPoints'];
		$clan->requiredTrophies = $dcd['requiredTrophies'];
		$clan->members = $dcd['members'];

		return $clan;
	}
}

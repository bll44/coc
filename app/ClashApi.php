<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Clan;
use App\Member;

class ClashApi extends Model
{
	private $curl;
	public $lastResponse;

	public function __construct()
	{
		$this->curl = new \anlutro\cURL\cURL;
	}

	public function getClanByTag($tag)
	{
		$request = $this->curl->newJsonRequest('GET', 'https://api.clashofclans.com/v1/clans/' . urlencode($tag), array())
									->setHeader('authorization', 'Bearer ' . env('API_KEY'));
		$response = $request->send();
		// decoded response
		$decodedResponse = json_decode($response, true);
		$this->lastResponse = $decodedResponse;

		$clan = new Clan;

		$clan->tag = $decodedResponse['tag'];
		$clan->name = $decodedResponse['name'];
		$clan->type = $decodedResponse['type'];
		$clan->description = $decodedResponse['description'];
		$clan->location_id = $decodedResponse['location']['id'];
		$clan->badge_small = $decodedResponse['badgeUrls']['small'];
		$clan->badge_medium = $decodedResponse['badgeUrls']['medium'];
		$clan->badge_large = $decodedResponse['badgeUrls']['large'];
		$clan->warFrequency = $decodedResponse['warFrequency'];
		$clan->clanLevel = $decodedResponse['clanLevel'];
		$clan->warWins = $decodedResponse['warWins'];
		$clan->warWinStreak = $decodedResponse['warWinStreak'];
		$clan->clanPoints = $decodedResponse['clanPoints'];
		$clan->requiredTrophies = $decodedResponse['requiredTrophies'];
		$clan->memberCount = $decodedResponse['members'];

		return $clan;
	}

	public function getClanMembersByTag($tag)
	{
		$request = $this->curl->newJsonRequest('GET', 'https://api.clashofclans.com/v1/clans/' . urlencode($tag) . '/members', array())
									->setHeader('authorization', 'Bearer ' . env('API_KEY'));
		$response = $request->send();
		$decodedResponse = json_decode($response, true);

		$members = array();

		foreach($decodedResponse['items'] as $item)
		{
			$member = new Member;
			$member->tag = $item['tag'];
			$member->name = $item['name'];
			$member->role = $item['role'];
			$member->expLevel = $item['expLevel'];
			$member->league_id = $item['league']['id'];
			$member->trophies = $item['trophies'];
			$member->clanRank = $item['clanRank'];
			$member->previousClanRank = $item['previousClanRank'];
			$member->donations = $item['donations'];
			$member->donationsReceived = $item['donationsReceived'];
			$members[] = $member;
		}

		return $members;
	}
}

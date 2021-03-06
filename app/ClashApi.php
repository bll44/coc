<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Clan;
use App\Member;
use App\League;
use App\Location;

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
		$request = $this->curl->newJsonRequest('GET', env('CLASH_BASE_API_URL').'/clans/' . urlencode($tag), array())
									->setHeader('authorization', 'Bearer ' . env('CLASH_API_KEY'));
		$response = $request->send();
		// 2nd param 'true' converts returned json object into associative php array
		$decodedResponse = json_decode($response, true);
		$this->lastResponse = $decodedResponse;

		$clan = $this->buildClanObject($response);

		return $clan;
	}

	public function getClanByName($name)
	{
		$request = $this->curl->newJsonRequest('GET', env('CLASH_BASE_API_URL').'/clans?name=' . trim($name), array())
									->setHeader('authorization', 'Bearer ' . env('CLASH_API_KEY'));
		$response = $request->send();
		// 2nd param 'true' converts returned json object into associative php array
		$decodedResponse = json_decode($response, true);
		$this->lastResponse = $decodedResponse;

		$clanResults = array();
		foreach($decodedResponse as $item)
		{
			$clanResults[] = $this->buildClanObject($item);
		}

		return $clanResults;
	}

	private function buildClanObject($item)
	{

		$clan = new Clan;

		$clan->tag = $item['tag'];
		$clan->name = $item['name'];
		$clan->type = $item['type'];
		$clan->description = $item['description'];
		$clan->location_id = $item['location']['id'];
		$clan->badge_small = $item['badgeUrls']['small'];
		$clan->badge_medium = $item['badgeUrls']['medium'];
		$clan->badge_large = $item['badgeUrls']['large'];
		$clan->warFrequency = $item['warFrequency'];
		$clan->clanLevel = $item['clanLevel'];
		$clan->warWins = $item['warWins'];
		$clan->warWinStreak = $item['warWinStreak'];
		$clan->clanPoints = $item['clanPoints'];
		$clan->requiredTrophies = $item['requiredTrophies'];
		$clan->memberCount = $item['members'];

		return $clan;
	}

	public function getClanMembersByTag($tag)
	{
		$request = $this->curl->newJsonRequest('GET', env('CLASH_BASE_API_URL').'/clans/' . urlencode($tag) . '/members', array())
									->setHeader('authorization', 'Bearer ' . env('CLASH_API_KEY'));
		$response = $request->send();
		$decodedResponse = json_decode($response, true);
		$this->lastResponse = $decodedResponse;

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

	public function getLeagues()
	{
		$request = $this->curl->newJsonRequest('GET', env('CLASH_BASE_API_URL').'/leagues', array())
									->setHeader('authorization', 'Bearer ' . env('CLASH_API_KEY'));
		$response = $request->send();
		$decodedResponse = json_decode($response, true);
		$this->lastResponse = $decodedResponse;
		$leagues = array();
		foreach($decodedResponse['items'] as $item)
		{
			$league = new League;
			$league->league_id = $item['id'];
			$league->name = $item['name'];
			$league->icon_small = $item['iconUrls']['small'];
			$league->icon_tiny = $item['iconUrls']['tiny'];
			if(isset($item['iconUrls']['medium']))
				$league->icon_medium = $item['iconUrls']['medium'];
			else
				$league->icon_medium = null;

			$leagues[] = $league;
		}

		return $leagues;
	}

	public function getLocations()
	{
		$request = $this->curl->newJsonRequest('GET', env('CLASH_BASE_API_URL').'/locations', array())
									->setHeader('authorization', 'Bearer ' . env('CLASH_API_KEY'));
		$response = $request->send();
		$decodedResponse = json_decode($response, true);
		$this->lastResponse = $decodedResponse;
		$locations = array();
		foreach($decodedResponse['items'] as $item)
		{
			$location = new Location;
			$location->location_id = $item['id'];
			$location->name = $item['name'];
			$location->isCountry = $item['isCountry'];
			if($location->isCountry)
				$location->countryCode = $item['countryCode'];
			else
				$location->countryCode = null;

			$locations[] = $location;
		}

		return $locations;
	}
}

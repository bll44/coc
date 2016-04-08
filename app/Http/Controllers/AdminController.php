<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ClashApi;
use App\Clan;
use App\League;
use App\Location;

class AdminController extends Controller
{
	public function index()
	{
		return view('admin/index');
	}

	public function refreshClans()
	{
		$cah = new ClashApi;
		$clans = Clan::all();
		foreach($clans as $clan)
		{
			$c = $cah->getClanByTag($clan->tag);
			$c->updateInformation();
			$members = $cah->getClanMembersByTag($clan->tag);
			foreach($members as $m)
			{
				$m->clanTag = $clan->tag;
				$m->updateInformation();
			}
		}
		return response()->json(['message' => 'Clan and members successfully updated.']);
	}

	public function refreshLeagues()
	{
		$cah = new ClashApi;
		$leagues = $cah->getLeagues();
		foreach($leagues as $l)
		{
			$result = League::where('league_id', $l->league_id)->first();
			if($result)
				$l->updateInformation();
			else
				$l->save();
		}
		return response()->json(['message' => 'Leagues sucessfully updated.']);
	}

	public function refreshLocations()
	{
		$cah = new ClashApi;
		$locations = $cah->getLocations();
		foreach($locations as $l)
		{
			$result = Location::where('location_id', $l->location_id)->first();
			if($result)
				$l->updateInformation();
			else
				$l->save();
		}
		return response()->json(['message' => 'Locations successfully updated.']);
	}
}

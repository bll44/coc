<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ClashApi;
use App\Clan;
use App\League;
use App\Location;
use Auth;

class AdminController extends Controller
{
	public function index()
	{
		return view('admin/index', ['activeNavLink' => 'dashboard']);
	}

	public function getAdminLogin()
	{
		return view('admin/admin_login', ['activeNavLink' => 'login']);
	}

	public function postAdminLogin(Request $http)
	{
		if(Auth::attempt(['username' => $http->username, 'password' => $http->password]))
			return redirect()->intended('/admin/index');
		else
			return redirect('/admin/login')->withInput();
	}

	public function getCreateAdminAccount()
	{
		return view('admin.create_admin_account');
	}

	public function postCreateAdminAccount(Request $http)
	{
		
		return redirect('/admin', ['http' => $http]);
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
		return response()->json(['message' => 'Clans and members successfully updated.']);
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

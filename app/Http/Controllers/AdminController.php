<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ClashApi;
use App\Clan;
use App\League;
use App\Location;
use Auth;
use App\User;
use Validator;
use Hash;

class AdminController extends Controller
{

	public function test()
	{
		return Auth::check() ? 'true' : 'false';
	}

	public function index()
	{
		return view('admin/index', ['activeNavLink' => 'dashboard']);
	}

	public function getAdminLogin()
	{
		if(Auth::check())
			return redirect('/admin/index')->with('authMessage', 'Already logged in.');
		return view('admin/admin_login', ['activeNavLink' => 'login']);
	}

	public function postAdminLogin(Request $http)
	{
		if(Auth::attempt(['username' => $http->username, 'password' => $http->password]))
			return redirect()->intended('/admin/index');
		else
			return redirect('/admin/login')
						->with('authMessage', 'Login failed. Please try again.')
						->withInput();
	}

	public function getCreateAdminAccount(Request $http)
	{
		return view('admin.create_admin_account', ['activeNavLink' => 'create']);
	}

	public function postCreateAdminAccount(Request $http, User $user)
	{
		$validator = Validator::make($http->all(), [
				'username' => 'required|unique:users|min:6',
				'password' => 'required|confirmed|min:6',
				'display_name' => 'required',
				'email' => 'email',
		]);

		if($validator->fails())
			return redirect('/admin/create_admin_account')
						->withErrors($validator)
						->withInput();

		$user->display_name = $http->display_name;
		$user->username = $http->username;
		$user->password = Hash::make($http->password);
		$user->admin = $http->admin ? 1 : 0;
		$user->email = $http->email;
		$user->save();

		return redirect('/admin');
	}

	public function logout()
	{
		Auth::logout();
		session()->flush();
		return redirect('/admin/index');
	}

	public function refreshClans()
	{
		$cah = new ClashApi;
		$clans = Clan::all();
		foreach($clans as $clan)
		{
			$c = $cah->getClanByTag($clan->tag);
			return $c;
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

	public function getViewUserProfile($username)
	{
		$user = User::where('username', $username)->first();
		return view('admin.user_profile', ['user' => $user, 'activeNavLink' => null]);
	}
}

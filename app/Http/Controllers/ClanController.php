<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ClashApi;
use App\Clan;
use App\Member;
use DB;

class ClanController extends Controller
{
	public function index()
	{
		$clans = Clan::all();
		return view('clans/index', ['activeNavLink' => 'clans', 'clans' => $clans]);
	}

	public function getSearchClans()
	{
		return view('clans/search_clans', ['activeNavLink' => 'clans']);
	}

	public function viewClan($tag)
	{
		$clan = Clan::where('tag', urldecode($tag))->first();
		return view('/clans/view_clan', compact('clan'));
	}

	public function getSearchClanResults(Request $http)
	{
		$tag = '#' . trim(strtoupper(str_replace('#', '', $http->clan_tag)));
		$ch = new ClashApi;
		$clan = $ch->getClanByTag($tag);
		session()->put('clan', $clan);
		session()->put('clanMembers', $ch->lastResponse['memberList']);
		$dualColumn = count($ch->lastResponse['memberList']) > 25 ? true : false;

		return view('clans/clan_search_results', array('clan' => $clan,
														'clanMemberList' => $ch->lastResponse['memberList'],
														'dualColumn' => $dualColumn));
	}

	public function getSaveClan(Request $http)
	{
		if($http->option === 'no')
			return redirect('/clans/search');

		$clan = session()->get('clan');

		$result = DB::select('select * from clans where tag = ?', array($clan->tag));

		if(count($result) < 1)
			$clan->save();
		else
			$clan->updateAllInformation();

		return view('clans/save_members', ['clanMembers' => session()->get('clanMembers'), 'clan' => $clan]);
	}

	public function getSaveClanMembers(Request $http)
	{
		if($http->option === 'no')
			return redirect('/clans')->with('message', 'Sucessfully saved clan to the database.');

		$clanTag = urldecode($http->clan);
		// retrieve and remove the clanMembers from the session
		$members = session()->get('clanMembers');

		foreach($members as $m)
		{
			$member = new Member;
			$member->tag = $m['tag'];
			$member->name = $m['name'];
			$member->role = $m['role'];
			$member->expLevel = $m['expLevel'];
			$member->league_id = $m['league']['id'];
			$member->trophies = $m['trophies'];
			$member->clanRank = $m['clanRank'];
			$member->previousClanRank = $m['previousClanRank'];
			$member->donations = $m['donations'];
			$member->donationsReceived = $m['donationsReceived'];
			$member->clanTag = $clanTag;

			$result = DB::select('select * from members where tag = ?', [$member->tag]);
			if(count($result) < 1)
				$member->save();
			else
				$member->updateAllInformation();
		}
		// flush session
		session()->flush();
		return redirect('/clans')->with('message', 'Sucessfully saved clan and members to the database.');

	}
}


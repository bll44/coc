<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ClashApi;
use App\Clan;
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
		$dualColumn = count($ch->lastResponse['memberList']) > 25 ? true : false;

		return view('clans/clan_search_results', array('clan' => $clan,
														'clanMemberList' => $ch->lastResponse['memberList'],
														'dualColumn' => $dualColumn));
	}

	public function getSaveClan(Request $http)
	{
		if($http->option == 'no')
			return redirect('/clans/search');

		$clan = session()->get('clan');

		$result = DB::select('select * from clans where tag = ?', array($clan->tag));

		if(count($result) < 1)
		{
			$clan->save();
		}
		elseif(count($result) > 0)
		{
			$clan->updateAllInformation();
		}

		return redirect('/clans');
	}
}

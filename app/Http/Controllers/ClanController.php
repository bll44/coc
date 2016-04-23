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

	public function viewClan($tag)
	{
		$clan = Clan::where('tag', urldecode($tag))->first();
		$members = Member::where('clanTag', $clan->tag)->orderBy('clanRank', 'asc')->paginate(10);
		$donationData = array();
		$donationData['totalDonations'] = 0;
		$donationData['totalDonationsReceived'] = 0;
		foreach($members as $m)
		{
			$donationData['totalDonations'] += $m->donations;
			$donationData['totalDonationsReceived'] += $m->donationsReceived;
		}
		return view('/clans/view_clan', [
						'clan' => $clan,
						'members' => $members,
						'donationData' => $donationData,
						'activeNavLink' => 'clans'
					]);
	}

	public function getDonationData(Request $http)
	{
		$donationsMemberList = Member::where('clanTag', urldecode($http->clanTag))->orderBy('donations', 'desc')->take(20)->get();
		$donationData = array();
		foreach($donationsMemberList as $m)
		{
			$memberData = [$m->name, $m->donations, $m->donationsReceived];
			$donationData[] = $memberData;
		}
		return json_encode(array_reverse($donationData));
	}

	public function getClanSearchResults(Request $http)
	{
		$ch = new ClashApi;

		if($http->type === 'tag')
		{
			$tag = '#' . trim(strtoupper(str_replace('#', '', $http->clan_tag)));
			$clan = $ch->getClanByTag($tag);
			return $clan;
			session()->put('clan', $clan);
			session()->put('clanMembers', $ch->lastResponse['memberList']);
			$dualColumn = count($ch->lastResponse['memberList']) > 25 ? true : false;
		}
		elseif($http->type === 'name')
		{

		}

		// return json_encode(['clan' => $clan]);

		// return view('clans/clan_search_results', array('clan' => $clan,
		// 												'clanMemberList' => $ch->lastResponse['memberList'],
		// 												'dualColumn' => $dualColumn));
	}

	public function getSaveClan(Request $http)
	{
		if($http->option === 'no')
			return redirect('/clans');

		$clan = session()->get('clan');

		$result = DB::select('select * from clans where tag = ?', array($clan->tag));

		if(count($result) < 1)
			$clan->save();
		else
			$clan->updateInformation();

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
				$member->updateInformation();
		}
		// flush session
		session()->flush();
		return redirect('/clans')->with('message', 'Sucessfully saved clan and members to the database.');

	}
}


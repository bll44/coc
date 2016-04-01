<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ClashApi;

class ClanController extends Controller
{
    public function index()
    {
    	return view('clans/index', ['activeNavLink' => 'clans']);
    }

    public function getSearchClans()
    {
    	return view('clans/search_clans', ['activeNavLink' => 'clans']);
    }

    public function getSearchClanResults(Request $http)
    {
    	$tag = '#' . trim(strtoupper(str_replace('#', '', $http->clan_tag)));
    	$ch = new ClashApi;
    	$clan = $ch->getClanByTag($tag);

    	return;
    }
}

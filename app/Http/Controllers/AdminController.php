<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ClashApi;

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
    		$c->updateAllInformation();
    		$members = $cah->getClanMembersByTag($clan->tag);
    		foreach($members as $m)
    		{
    			$m->clanTag = $clan->tag;
    			$m->updateAllInformation();
    		}
    	}
    	// this method still needs more added to finish it off
    }
}

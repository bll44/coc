<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Clan;

class MemberController extends Controller
{
    public function index()
    {
    	$clans = Clan::all();
    	return view('members/index', compact('clans'));
    }

    public function viewMembersByClan($tag)
    {
    	$clan = Clan::where('tag', urldecode($tag))->first();
    	$members = $clan->members;

    	return view('members/list', compact('clan', 'members'));
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	protected $table = 'members';

	public function clan()
	{
		return $this->belongsTo('App\Clan', 'clanTag', 'tag');
	}

	public function updateAllInformation()
	{
		$affectedRows = Member::where('tag', $this->tag)
								->update([
									'name' => $this->name,
									'role' => $this->role,
									'expLevel' => $this->expLevel,
									'league_id' => $this->league_id,
									'trophies' => $this->trophies,
									'clanRank' => $this->clanRank,
									'previousClanRank' => $this->previousClanRank,
									'donations' => $this->donations,
									'donationsReceived' => $this->donationsReceived,
									'clanTag' => $this->clanTag
								]);
		return $affectedRows > 0 ? true : false;
	}
}

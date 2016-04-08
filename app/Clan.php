<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DB;

class Clan extends Model
{
	protected $table = 'clans';

	public function updateInformation()
	{
		$affectedRows = Clan::where('tag', $this->tag)
								->update([
									'name' => $this->name,
									'type' => $this->type,
									'description' => $this->description,
									'location_id' => $this->location_id,
									'badge_small' => $this->badge_small,
									'badge_medium' => $this->badge_medium,
									'badge_large' => $this->badge_large,
									'warFrequency' => $this->warFrequency,
									'clanLevel' => $this->clanLevel,
									'warWins' => $this->warWins,
									'warWinStreak' => $this->warWinStreak,
									'clanPoints' => $this->clanPoints,
									'requiredTrophies' => $this->requiredTrophies,
									'memberCount' => $this->memberCount
								]);
		return $affectedRows > 0 ? true : false;
	}

	public function members()
	{
		return $this->hasMany('App\Member', 'clanTag', 'tag');
	}

	public function getTopDonator()
	{
		$result = DB::select('select * from members where clanTag = ? order by donations desc', [$this->tag]);
		return $result[0];
	}

	public function location()
	{
		return $this->belongsTo('App\Location', 'location_id', 'location_id');
	}
}

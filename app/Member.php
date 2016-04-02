<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	protected $table = 'members';

	public function clan()
	{
		$this->belongsTo('App\Clan', 'clanTag', 'tag');
	}
}

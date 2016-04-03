<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
	protected $table = 'leagues';

	public function updateInformation()
	{
		$affectedRows = League::where('league_id', $this->league_id)
									->update([
										'name' => $this->name,
										'icon_small' => $this->icon_small,
										'icon_tiny' => $this->icon_tiny,
										'icon_medium' => $this->icon_medium
									]);
		return $affectedRows > 0 ? true : false;
	}
}

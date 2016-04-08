<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    public function clans()
    {
    	return $this->hasMany('App\Clan', 'location_id', 'location_id');
    }

    public function updateInformation()
    {
    	$affectedRows = Location::where('location_id', $this->location_id)
									->update([
										'name' => $this->name,
										'isCountry' => $this->isCountry,
										'countryCode' => $this->countryCode
									]);
		return $affectedRows > 0 ? true : false;
    }
}

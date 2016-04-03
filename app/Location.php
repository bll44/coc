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
}

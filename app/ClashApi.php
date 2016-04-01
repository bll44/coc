<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClashApi extends Model
{
    public function getClan($tag)
    {
    	curl -X GET --header "Accept: application/json" --header "authorization: Bearer <API token>" "https://api.clashofclans.com/v1/clans/%23YVUV92R"
    	return;
    }
}

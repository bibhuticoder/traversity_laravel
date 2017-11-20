<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    //
    public function locations()
    {
        return $this->belongsToMany('App\Location', 'location_route', 'route_id', 'location_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}

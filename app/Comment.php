<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function route()
    {
        return $this->belongsTo('App\Route');
    }
}

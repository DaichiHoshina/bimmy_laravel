<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    public function news()
    {
        return $this->belongsTo('App\News');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

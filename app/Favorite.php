<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function news()
    {
        return $this->belongsTo('App\News');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function favorite_news()
    {
        return $this->belongsTo('App\User', 'App\Favorite');
    }
}

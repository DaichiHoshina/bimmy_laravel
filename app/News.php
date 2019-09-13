<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'body'  => 'required',
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function favorite_users()
    {
        return $this->hasManyThrough('App\User', 'App\Favorite');
    }
}

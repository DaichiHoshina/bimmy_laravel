<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'body'  => 'required',
    );
}

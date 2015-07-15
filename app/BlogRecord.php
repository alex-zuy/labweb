<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogRecord extends Model
{
    protected $fillable = ['subject', 'text'];

    public function comments()
    {
        return $this->hasMany('App\BlogRecordComment');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestBookRecord extends Model
{
    protected $fillable = ['full_name', 'email', 'text'];
}

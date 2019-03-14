<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    //
    //public $table = "events";
    protected $fillable = ['title','venue','start','end'];
}

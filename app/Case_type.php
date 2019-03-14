<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Case_type extends Model
{
    protected $fillable = [
        'case_name','case_description'
    ];
}
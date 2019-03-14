<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
     protected $fillable = [
        'fname','lname','username','password','pincode','contact','email', 'role', 'department',
    ];
}

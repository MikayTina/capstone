<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Users extends Model 
{
    use Notifiable;

     protected $fillable = [
<<<<<<< HEAD

      //  'fname','lname','username','password','pincode','contact','email', 'role', 'department',

        'user_id','fname','lname','username','password','contact','email', 'role', 'department',
=======
        'user_id','fname','lname','username','password','contact','email', 'role', 'designation','department',
>>>>>>> 600cab594feb8db6b13cf6bbc56dd8a801ec984c
    ];

    public function user_departments()
    {
        return $this->belongsTo('App\Departments', 'department');
    }

     public function user_roles()
    {
        return $this->belongsTo('App\User_roles', 'role');
    }
}

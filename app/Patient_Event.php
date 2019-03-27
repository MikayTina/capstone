<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_Event extends Model
{
    //
    
    protected $fillable = ['id','event_id','patient_id','status'];
}

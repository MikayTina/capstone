<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_Event_List extends Model
{
    //
        public $table = "patient_event_lists";

    protected $fillable = ['id','event_id','patient_id','status'];


}

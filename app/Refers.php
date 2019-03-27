<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refers extends Model
{
    //
     protected $fillable = ['id','ref_date', 'patient_id', 'ref_at', 'ref_reason', 'ref_by', 'contact_person', 'recommen', 'ref_back_date', 'ref_back_by', 'accepted_by', 'ref_slip_return'];
}

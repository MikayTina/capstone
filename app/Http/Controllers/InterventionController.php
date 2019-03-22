<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use App\Users;
use App\User_roles;
use App\Interventions;
use App\Departments;
use Session;


class InterventionController extends Controller
{
   
    public function showintervention()
     {

    
        $roles = User_roles::all();
        $deps = Departments::all();
        $inter = Interventions::all();

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('intervention.viewIntervention')->with('roles',$roles)->with('deps',$deps)->with('inter', $inter);
        }
        else{
            return abort(404);
        }

    }

     public function addintervention()
     {

    
        $roles = User_roles::all();
        $deps = Departments::all();
        $inter = Interventions::all();


        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('intervention.addIntervention')->with('roles',$roles)->with('deps',$deps)->with('inter', $inter);
        }
        else{
            return abort(404);
        }

    }


   
}
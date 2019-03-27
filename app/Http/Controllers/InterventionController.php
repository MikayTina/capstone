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

<<<<<<< HEAD
        
        $roles = User_roles::all();
        $deps = Departments::all();
        $inter = Interventions::where('parent', 0)->get();
        $users = Users::find(Auth::user()->id);
        //$transfer = Transfer_Requests::all();

        /*return view('superadmin.showpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('transfer',$transfer);*/

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('intervention.viewIntervention')->with('roles',$roles)->with('deps',$deps)->with('inter', $inter)->with('users',$users);
=======
    
        $roles = User_roles::all();
        $deps = Departments::all();
        $inter = Interventions::where('parent', 0)->get();


        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('intervention.viewIntervention')->with('roles',$roles)->with('deps',$deps)->with('inter', $inter);
>>>>>>> 600cab594feb8db6b13cf6bbc56dd8a801ec984c
        }
        else{
            return abort(404);
        }

    }

     public function addintervention()
     {

    
        $roles = User_roles::all();
        $deps = Departments::all();
<<<<<<< HEAD
         $users = Users::find(Auth::user()->id);
=======
>>>>>>> 600cab594feb8db6b13cf6bbc56dd8a801ec984c
     //   $inter = Interventions::all();

        $inter = Interventions::where('parent', 0)->get();

<<<<<<< HEAD
        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('intervention.addIntervention')->with('roles',$roles)->with('deps',$deps)->with('inter', $inter)->with('users',$users);
=======
    if(Auth::user()->role == 1){
            return view('intervention.addIntervention')->with('roles',$roles)->with('deps',$deps)->with('inter', $inter);
>>>>>>> 600cab594feb8db6b13cf6bbc56dd8a801ec984c
        }
        else{
            return abort(404);
        }

    }

      public function   create_intervention(Request $request)
     {
            $roles = User_roles::all();
        $deps = Departments::all();
     //   $inter = Interventions::all();

        $inter = Interventions::where('parent', 0)->get();

          $input = $request->all(); 

              $interven = new Interventions([
                'parent' => $request->input('parent'),
                'interven_name' => $request->input('name'),
                'descrpt' => $request->input('descrpt'),
                ]);

      $interven->save();
      Session::flash('alert-class', 'success'); 
      flash('Intervention Created', '')->overlay();

        $roles = User_roles::all();
        $deps = Departments::all();

          if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('intervention.addIntervention')->with('roles',$roles)->with('deps',$deps)->with('inter', $inter);
        }
        else{
            return abort(404);
        }
         
     }
   
}
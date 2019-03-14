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
use Calendar;
use App\Users;
use App\User_roles;
use App\Departments;
use App\Events;
use Hash;
use Session;

class CalendarController extends Controller
{
   public function showCalen()
   {


       $roles = User_roles::all();
        $deps = Departments::all();


       return view('calendar.viewCalendar')->with('roles',$roles)->with('deps',$deps);

   }

   public function get_Events()
   {
          $events = Events::all()->toArray();
          return response()->json($events);

   }

    public function create_event(){

       $roles = User_roles::all();
        $deps = Departments::all();

       return view('calendar.createEvent')->with('roles',$roles)->with('deps',$deps);
      
    }

    public function add_event(Request $request){

        $input = $request->all();     

        $event = new Events([
        'title' => $request->input('title'),
        'venue' => $request->input('venue'),
        'start' => $request->input('event_date')." ".date("H:m:s", strtotime($request->input('start_time'))),
        'end' => $request->input('event_date')." ".date("H:m:s", strtotime($request->input('end_time')))
        ]);

      $event->save();

      Session::flash('alert-class', 'success'); 
      flash('Schedule Created', '')->overlay();

        $roles = User_roles::all();
        $deps = Departments::all();
        return view('superadmin.chooseuser')->with('roles',$roles)->with('deps',$deps);

    }

}

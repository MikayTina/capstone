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
use App\Patients;
use App\Interventions;
use App\Patient_Event_List;
use Hash;
use Session;

class CalendarController extends Controller
{
   public function showCalen()
   {


       $roles = User_roles::all();
       $deps = Departments::all();
       


      // return view('calendar.viewCalendar')->with('roles',$roles)->with('deps',$deps);
       $users = Users::find(Auth::user()->id);
      

       return view('calendar.viewCalendar')->with('roles',$roles)->with('deps',$deps)->with('users',$users);

   }

   public function get_Events()
   {
          $events = Events::all()->toArray();

          return response()->json($events);

   }

    public function create_event(){

       $roles = User_roles::all();
       $deps = Departments::all();
       $patients = Patients::all();

        $interven = Interventions::all();

       $interven = Interventions::all();
       $users = Users::find(Auth::user()->id);


      // $pat = Patients::select(DB::raw("CONCAT('fname','lname') AS display_name"),'id')->get()->pluck('display_name','id');



      // return view('calendar.createEvent')->with('roles',$roles)->with('deps',$deps)->with('interven', $interven)->with('patients', $patients);

       return view('calendar.createEvent')->with('roles',$roles)->with('deps',$deps)->with('interven', $interven)->with('patients', $patients)->with('users',$users);

      
    }

    public function add_event(Request $request){

        $events = rand();
        $input = $request->all();    

        $patients = $request->input('checkitem');

        $event = new Events([
           'evt_id' => $events,
        'title' => $request->input('title'),
        'venue' => $request->input('venue'),
        'start' => $request->input('start_date')." ".date("H:m:s", strtotime($request->input('start_time'))),
        'end' => $request->input('end_date')." ".date("H:m:s", strtotime($request->input('end_time'))),
        'start_date' => $request->input('start_date'),
         'end_date' => $request->input('end_date'),
        'start_time' => $request->input('start_time'),
        'end_time' => $request->input('end_time')

   //     'end' => $request->input('event_date')." ".date("H:m:s", strtotime($request->input('end_time')))
        ]);

      $event->save();

       /* $events_i = Events::where('id', $events)->get();

        foreach($events as $evnt)
        {
            $event_id = $evnt->id;
        }*/

        foreach($request->input('checkitem') as $pat)
        {


            $patient_event = new Patient_Event_List([

                'event_id' =>  $events,
                'patient_id' => $pat,
                'status' => 1


            ]);
            $patient_event->save();
        }


      Session::flash('alert-class', 'success'); 
      flash('Schedule Created', '')->overlay();

        $roles = User_roles::all();
        $deps = Departments::all();
 
    //    return view('superadmin.chooseuser')->with('roles',$roles)->with('deps',$deps);

        $users = Users::find(Auth::user()->id);

        return view('superadmin.chooseuser')->with('roles',$roles)->with('deps',$deps)->with('users',$users);

    }

    public function viewevent($id)
    {
        $pid = 0;
        $evt = Events::where('id',$id)->get();
        $roles = User_roles::all();
        $deps = Departments::all();
        $interven = Interventions::where('parent', 0)->get();
        $event_patient = Patient_Event_List::where('events.id', $id)->join('events', 'events.evt_id', '=', 'patient_event_lists.event_id')->join('patients', 'patients.id','=', 'patient_event_lists.patient_id')->select('patient_event_lists.*', 'patients.lname as lname', 'patients.fname as fname', 'patients.mname as mname')->get(); 
        //return view('calendar.viewEvent')->with('roles' , $roles)->with('deps',$deps)->with('evt' ,$evt);

        $users = Users::find(Auth::user()->id);

        return view('calendar.viewEvent')->with('roles' , $roles)->with('deps',$deps)->with('evt' ,$evt)->with('users',$users)->with('pats', $event_patient)->with('intv', $interven);

    }

}

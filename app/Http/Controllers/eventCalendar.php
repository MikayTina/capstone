

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
use App\Event;
use Hash;
use Session;

class eventCalendar extends Controller
{
   public function showCalen()
   {


       $roles = User_roles::all();
        $deps = Departments::all();

/*        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \Date($value->start_date),
                    new \Time($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                        'url' => 'profile',
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
      return view('calendar.viewCalendar', compact('calendar'))->with('roles',$roles)->with('deps',$deps);*/
       return view('calendar.viewCalendar')->with('roles',$roles)->with('deps',$deps);

   }

}

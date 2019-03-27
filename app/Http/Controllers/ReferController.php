<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Response;
use Auth;
use DB;
use Calendar;
use App\Users;
use App\User_roles;
use App\Departments;
use App\Events;
use App\Patients;
use App\Refers;
use Hash;
use Session;

class ReferController extends Controller
{
	public function createRefer(Request $request)
    {


    	 $refer = Refers::create($request->all());
    	 return Response::json($refer);

    }


    public function getRefer($id) {

    $data = Refers::find($id);
    return Response::json($data);

	}
		  

}
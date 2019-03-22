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
use App\Departments;
use Hash;
use Session;

class UserController extends Controller
{
	public function chooseuser_role()
	{
		$roles = User_roles::all();
		$deps = Departments::all();

		if(Auth::user()->user_role()->first()->name == 'Superadmin'){
			return view('superadmin.chooseuser')->with('roles',$roles)->with('deps',$deps);
		}
		elseif(Auth::user()->user_role()->first()->name == 'Admin'){
			return view('admin.chooseuser')->with('roles',$roles)->with('deps',$deps);
		}
		else{
			return abort(404);
		}
	}

	public function create_user($date)
	{
		$roles = User_roles::all();
		$rolex = User_roles::find($id);
		$deps = Departments::all();

		if(Auth::user()->user_role()->first()->name == 'Superadmin'){
			return view('superadmin.createuser')->with('roles',$roles)->with('deps',$deps)->with('rolex',$rolex);
		}
		elseif(Auth::user()->user_role()->first()->name == 'Admin'){
			return view('admin.createuser')->with('roles',$roles)->with('deps',$deps)->with('rolex',$rolex);
		}
		else{
			return abort(404);
		}
	}

	public function createuserrole()
	{
		$roles = User_roles::all();
		$deps = Departments::all();

		if(Auth::user()->user_role()->first()->name == 'Superadmin'){
			return view('superadmin.createrole')->with('roles',$roles)->with('deps',$deps);
		}
		else{
			return abort(404);
		}
	}

	public function postcreate_dep()
	{
		$roles = User_roles::all();
		$deps = Departments::all();

		if(Auth::user()->user_role()->first()->name == 'Superadmin'){
			return view('superadmin.postcreatedep')->with('roles',$roles)->with('deps',$deps);
		}
		else{
			return abort(404);
		}
	}

	public function create_depnow()
	{
		$roles = User_roles::all();
		$deps = Departments::all();

		if(Auth::user()->user_role()->first()->name == 'Superadmin'){
			return view('superadmin.createdep')->with('roles',$roles)->with('deps',$deps);
		}
		else{
			return abort(404);
		}
	}

	public function deletenow(Request $request)
	{
		$deleteuser = User_roles::findorfail($request->role);
		$deleteuser->delete();

		$deleterole = DB::table('users')->where('role',$request->role)->delete();

		Session::flash('alert-class', 'danger'); 
		flash('Role Deleted', '')->overlay();

		return back();
	}

	public function updatenow(Request $request)
	{
		$user = Users::find($request->userid);
		$user->update($request->all());

		Session::flash('alert-class', 'success'); 
		flash('Successfully Updated', '')->overlay();
 
		return redirect()->back();
	}

	public function deleteuser(Request $request)
	{
		$deleteuser = Users::findorfail($request->user_id);
		$deleteuser->delete();

		Session::flash('alert-class', 'danger'); 
		flash('Successfully Deleted', '')->overlay();

        return back();
	}

	public function showintervention()
     {

    
        $roles = User_roles::all();
        $deps = Departments::all();

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('intervention.viewIntervention')->with('roles',$roles)->with('deps',$deps);
        }
        else{
            return abort(404);
        }

    }

}

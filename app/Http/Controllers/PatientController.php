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
use App\Patient;
use App\Users;
use App\User_roles;
use App\Departments;
use App\Case_type;

use App\Patients;
use App\Address;
use App\Emergency_Persons;
use App\Patient_Intake_Information;
use App\Patient_Informant;
use App\Patient_Information;
use Hash;
use Session;

class PatientController extends Controller
{
    public function addpatient()
    {
    	$roles = User_roles::all();
		$deps = Departments::all();
        $type = Case_type::all();


    	return view('superadmin.addpatient')->with('roles',$roles)->with('deps',$deps)->with('type',$type);
    }

    public function refer()
    {
    	$roles = User_roles::all();
		$deps = Departments::all();
        var_dump('sample');
        if(Auth::user()->role == 1){
            return view('superadmin.addpatient')->with('roles',$roles)->with('deps' ,$deps);
        }
        else{
        return view('superadmin.refpatient')->with('roles',$roles)->with('deps',$deps)->with('type',$type);
        }
    	//return view('superadmin.refpatient')->with('roles',$roles)->with('deps',$deps);
    }

    public function showpatient()
    {
        $pat = Patients::with('departments')->with('address')->get();
        $roles = User_roles::all();
        $deps = Departments::all();

        return view('superadmin.showpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat);
    }

    public function viewpatient($id)
    {
        $pat = Patients::where('id',$id)->get();
        $roles = User_roles::all();
        $deps = Departments::all();

        return view('superadmin.viewpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat);

    }

    public function patientdep()
    {
        $roles = User_roles::all();
        $deps = Departments::all();


        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.patientdep')->with('roles' , $roles)->with('deps',$deps);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.patientdep')->with('roles' , $roles)->with('deps',$deps);
        }
        else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
            $id = Auth::user()->department;
            return view('socialworker.chooseform')->with('roles' , $roles)->with('deps',$deps)->with('id',$id);
        }
    }

    public function chooseform($id)
    {
        $roles = User_roles::all();
        $deps = Departments::all();

         if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.patientform')->with('roles' , $roles)->with('deps',$deps)->with('id',$id);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.patientform')->with('roles' , $roles)->with('deps',$deps)->with('id',$id);
        }
    }

    public function intakeform($id)
    {
        $roles = User_roles::all();
        $deps = Departments::all();

        return view('socialworker.intakeform')->with('roles' , $roles)->with('deps',$deps)->with('id',$id);
    }

    public function ddeform($id)
    {
        $roles = User_roles::all();
        $deps = Departments::all();

        return view('socialworker.ddeform')->with('roles' , $roles)->with('deps',$deps)->with('id',$id);
    }

    public function save_intake(Request $request)
    {
        $add = rand();
        $emer = rand();
        $pat = rand();

        $address = new Address([
            'address_id' => $add,
            'street' => $request->input('street'),
            'barangay' => $request->input('barangay'),
            'city'  => $request->input('city')

        ]);

        $address->save();

        $addr = Address::where('address_id',$add)->get();

        foreach($addr as $adds)
        {
            $address_id = $adds->id;
        }


        $patient = new Patients([
            'patient_id' => $pat,
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'mname' => $request->input('mname'),
            'age' => $request->input('age'),
            'birthdate' => $request->input('bday'),
            'civil_status' => $request->input('civils'),
            'address_id' => $address_id,
            'department_id' => $request->input('department'),
        ]);

        $patient->save();

        $pats = Patients::where('patient_id',$pat)->get();

        foreach($pats as $patss)
        {
            $patient_id = $patss->id;
        }

        $emergency_people = new Emergency_Persons([
            'emergency_id' => $emer,
            'name' => $request->input('emername'),
            'phone' => $request->input('emerphone'),
            'cellphone' => $request->input('emercell'),
            'relationship' => $request->input('emerelation'),
            'email' => $request->input('emeremail'),
        ]);

        $emergency_people->save();

        $emers = Emergency_Persons::where('emergency_id',$emer)->get();

        foreach($emers as $emerss)
        {
            $emergency_id = $emerss->id;
        }


        $patient_intake_info = new Patient_Intake_Information([
            'patient_id' => $patient_id,
            'emergency_id' => $emergency_id,
            'educational_attainment' => $request->input('eduattain'),
            'employment_status' => $request->input('edstat'),
            'spouse' => $request->input('spouse'),
            'father' => $request->input('fathname'),
            'mother' => $request->input('mothname'),
            'presenting_problems' => $request->input('preprob'),    
            'impression' => $request->input('impre'),
            'date' => date('M-j-Y'),
        ]);

        $patient_intake_info->save();

        Session::flash('alert-class', 'success'); 
        flash('Patient Created', '')->overlay();

        $pat = Patients::with('departments')->with('address')->get();
        $roles = User_roles::all();
        $deps = Departments::all();

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat);
        }
        else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
            return view('socialworker.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat);
        }

    }

    public function save_dde(Request $request)
    {
        $add = rand();
        $inf = rand();
        $pat = rand();

        $address = new Address([
            'address_id' => $add,
            'street' => $request->input('street'),
            'barangay' => $request->input('barangay'),
            'city'  => $request->input('city')

        ]);

        $address->save();

        $addr = Address::where('address_id',$add)->get();

        foreach($addr as $adds)
        {
            $address_id = $adds->id;
        }

        $patient = new Patients([
            'patient_id' => $pat,
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'mname' => $request->input('mname'),
            'age' => $request->input('age'),
            'birthdate' => $request->input('bday'),
            'birthorder' => $request->input('border'),
            'address_id' => $address_id,
            'contact' => $request->input('contact'),
            'gender' => $request->input('gender'),
            'civil_status' => $request->input('civils'),
            'nationality' => $request->input('nation'),
            'religion' => $request->input('religion'),
            'case' => $request->input('casetype'),
            'submission' => $request->input('type'),
            'department_id' => $request->input('department'),
        ]);

        $patient->save();

        $pats = Patients::where('patient_id',$pat)->get();

        foreach($pats as $patss)
        {
            $patient_id = $patss->id;
        }

        $patient_informant = new Patient_Informant([
            'informant_id' => $inf,
            'name' => $request->input('infoname'),
            'address' => $request->input('infoadd'),
            'contact' => $request->input('infocontact'),
        ]);

        $patient_informant->save();

        $infos = Patient_Informant::where('informant_id',$inf)->get();

        foreach($infos as $info)
        {
            $informant_id = $info->id;
        }

        $information = new Patient_Information([
            'patient_id' => $patient_id,
            'informant_id' => $informant_id,
            'referred_by' => $request->input('referred'),
            'drugs_abused' => $request->input('dabused'),
            'chief_complaint' => $request->input('ccomplaint'),
            'h_present_illness' => $request->input('pillness'),
            'h_drug_abuse' => $request->input('dused'),
            'famper_history' => $request->input('background'),
        ]);

        $information->save();

        Session::flash('alert-class', 'success'); 
        flash('Patient Created', '')->overlay();

        $pat = Patients::with('departments')->with('address')->get();
        $roles = User_roles::all();
        $deps = Departments::all();

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat);
        }
        else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
            return view('socialworker.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat);
        }

    }

    public function flagdelete(Request $request)
    {
        $id = $request->input('patientid');

        Patients::where('id',$id)->update(['flag' => 'deleted']);

        Session::flash('alert-class', 'danger'); 
        flash('Patient Deleted', '')->overlay();

        $pat = Patients::with('departments')->with('address')->get();
        $roles = User_roles::all();
        $deps = Departments::all();

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat);
        }
        else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
            return view('socialworker.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat);
        }
    }
}

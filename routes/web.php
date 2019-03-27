<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('foo', function () {
    return 'Hello World';
});

Route::group(['middleware' =>'guest'], function()
{
	Route::any('/', [
	'uses' => 'LoginController@home',
	'as' => 'login'
]);

Route::view('/register','register');

Route::post('/loginnow', "LoginController@loginnow");

Route::view('/login', "login");

Route::get('/user', 'UserController@create_user');

Route::get('/loginnow', "LoginController@loginnow");

  
});



Route::get('/logout', "LoginController@logout");

Route::group(['middleware' =>'auth'], function()
{
	 Route::get('/profile', [
      	'uses'=>'LoginController@getProfile',
      	'as'=> 'user.dashboard'
    ]);

	 Route::get('showUsers/{id}', [
      	'uses'=>'ViewController@getUsers',
      	'as'=> 'showUsers'
    ]);

	  Route::get('showDeps/{id}', [
      	'uses'=>'ViewController@getDeps',
      	'as'=> 'showDeps'
    ]);

    Route::get('/showCalendar', [
      	'uses'=>'CalendarController@showCalen',
      	'as'=> 'showCalendar'
    ]);

	 Route::get('/getEvent', ['as'=>'getEvent',
    'uses'=>'CalendarController@get_Events'

	]); 

	  Route::get('/showCalendar', [
      	'uses'=>'CalendarController@showCalen',
      	'as'=> 'showCalendar'
    ]);

	 Route::get('/getEvent', ['as'=>'getEvent',
    'uses'=>'CalendarController@get_Events'

	]);
	/*Route::post('/refers', function (Request $request) {
    $refer = Refers::create($request->all());
    return Response::json($refer);
	});*/

	Route::post('/refers', "ReferController@createRefer");
	Route::get('/refers/{id}', "ReferController@getRefer");
 
//--UPDATE a link--//
/*Route::put('/links/{link_id?}', function (Request $request, $link_id) {
    $link = Link::find($link_id);
    $link->url = $request->url;
    $link->description = $request->description;
    $link->save();
    return Response::json($link);
});*/
 

	 Route::any('/chooseuser', "UserController@chooseuser_role");

	 Route::any('/createuserrole', "UserController@createuserrole");

	 Route::get('/create_user', "UserController@create_user");

	 Route::any('/create_dep', "UserController@postcreate_dep");

	 Route::any('/create_depnow', "UserController@create_depnow");

	 Route::post('/register_role', "RegisterController@register_role");

	 Route::post('/register_dep', "RegisterController@register_dep");

	 Route::post('/registernow', "RegisterController@registernow");

	 Route::post('/deletenow', "UserController@deletenow");

	 Route::post('/updatenow', "UserController@updatenow");

	 Route::post('/deleteuser', "UserController@deleteuser");

	 Route::get('/showdep_users/{did}/{rid}', "ViewController@showdepuser");

	 Route::any('/addpatient', "PatientController@addpatient");

	 Route::post('/refer', "PatientController@refer");



	 Route::any('/create_event', "CalendarController@create_event");

	 Route::any('/add_event', "CalendarController@add_event");

	 Route::get('/view_event/{id}', "CalendarController@viewevent");

 
	
	 Route::any('/showpatients', "PatientController@showpatient");

	 Route::get('/viewpatient/{id}', "PatientController@viewpatient");

	 Route::get('/viewpatients/{id}/{pid}/{tid}', "PatientController@viewpatients");

	 Route::get('/viewpatientz/{id}/{nid}', "PatientController@viewpatientz");

	 Route::any('/patient_dep', "PatientController@patientdep");

	 Route::get('/choosef/{id}', "PatientController@chooseform");

	 Route::get('/intakeform/{id}', "PatientController@intakeform");

	 Route::get('/ddeform/{id}', "PatientController@ddeform");

	 Route::post('/patientsave_intake', "PatientController@save_intake");

	 Route::post('/patientsave_dde', "PatientController@save_dde");

	 Route::post('/deletepatient', "PatientController@flagdelete");

 
	 Route::any('/add_intervention', "InterventionController@addintervention");

	 Route::any('/showIntervention', "InterventionController@showintervention");



	 Route::get('/markAsRead', "NotificationsController@markAsRead");

	 Route::post('/patientTransfer', "PatientController@transferPatient");

<<<<<<< HEAD
	 Route::get('/transfer_patient_now/{id}/{did}/{tid}',"PatientController@patientTransfer");

=======
	 Route::get('/transfer_patient_now/{id}/{did}/{tid}/{pid}',"PatientController@patientTransfer");

	 Route::any('/showemployees',"ViewController@showemployees");

	 Route::any('/newemployee',"RegisterController@newemployee");

	 Route::post('/create_employee',"RegisterController@create_employee");

	 Route::post('/update_employeenow',"EmployeeController@update_employeenow");

	 Route::post('/delete_employee', "EmployeeController@delete_employeenow");

	 Route::any('/logs', "ViewController@showlogs");
>>>>>>> 600cab594feb8db6b13cf6bbc56dd8a801ec984c
});
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class UsersController extends Controller
{
    public function showDataForm(){
		return view('modules.users.forms.data-form');
	}

	public function register(Request $request){
		$validator = Validator::make($request->input(), [
			'cedula' => 'numeric|required|unique:users',
			'firstname' => 'regex:/^[[:alpha:]]+( [[:alpha:]]+)?$/|required|min:3|max:45',
			'lastname' => 'regex:/^[[:alpha:]]+( [[:alpha:]]+)?$/|required|min:3|max:45',
			'user_type' => 'required',
			'email' => 'email|required',
			'phone' => 'numeric|required',
			'birthdate' => 'date|required|',
			'gender' => 'boolean|required',
		])->validate();
		#if ($validator->fails())
		#	return redirect()->back();

		$user = new User();
		$user->cedula = $request->cedula;
		$user->firstname = $request->firstname;
		$user->lastname = $request->lastname;
		$user->user_type = $request->user_type;
		$user->password = \Hash::make($request->cedula);
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->birthdate = $request->birthdate;
		$user->gender = $request->gender;
		$user->department_id = \Auth::user()->department_id;
		$user->save();
		$user->generateRegistrationNotify();
		\Session::push('status','success');
		return redirect("usuarios/registrar");
	}
}

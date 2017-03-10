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
		Validator::make($request->input(), [
			'cedula' => 'numeric|required|unique:users',
			'firstname' => 'regex:/^[[:alpha:]]+( [[:alpha:]]+)?$/|required|min:3|max:45',
			'lastname' => 'regex:/^[[:alpha:]]+( [[:alpha:]]+)?$/|required|min:3|max:45',
			'user_type' => 'required',
			'email' => 'email|required',
			'phone' => 'numeric|required',
			'birthdate' => 'date|required|',
			'gender' => 'boolean|required',
		])->validate();

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

	public function getUpdateForm(Request $request){
		$user = User::find($request->id);
		if (!$user || $user->isDev()) return view('errors.404');
		return view('modules.users.forms.data-form')->with('user', $user);
	}

	public function update(Request $request){
		$user = User::find($request->id);
		if (!$user || $user->isDev()) return redirect('errors/404');
		Validator::make($request->input(), [
			'cedula' => 'numeric|required|unique:users',
			'firstname' => 'regex:/^[[:alpha:]]+( [[:alpha:]]+)?$/|required|min:3|max:45',
			'lastname' => 'regex:/^[[:alpha:]]+( [[:alpha:]]+)?$/|required|min:3|max:45',
			'user_type' => 'required',
			'email' => 'email|required',
			'phone' => 'numeric|required',
			'birthdate' => 'date|required|',
			'gender' => 'boolean|required',
		])->validate();

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

		\Session::push('status','success');
		return redirect("usuarios/editar/".$request->id)->with('user', $user);
	}
}

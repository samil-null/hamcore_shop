<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Repository\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends AdminController
{

	private $users;

	public function __construct(Users $users)
	{
		$this->users = $users;
	}
    public function index()
    {
    	$users = $this->users->getUsers();
    	return view('admin.user.index',compact('users'));
    }

    public function create()
    {
    	//$user = new stdClass;
    	return view('admin.user.user');
    }

    public function store(Request $request)
    {
    	// $validator = $request->validate([
    	// 	'name' => 'required',
    	// 	'email' => 'required|unique:users|min:6|max:18',
    	// 	'password' => 'required|confirmed'
    	// ]);
    	//$errors = $validator->errors();
		$user = $this->users->create($request);

		return  redirect()->route('admin.users', ['id' => $user->id]);
    	//dd($validate);

    	//User::create($request->only());
	}
	
	public function show($id)
	{
		$user = $this->users->getUser($id);

		return view('admin.user.user',compact('user'));
	}

	public function destroy($id)
	{
		$this->users->destroy($id);
	}
}

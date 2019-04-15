<?php 

namespace App\Repository;

use App\User;

class Users
{
    public function getUsers($filter = [])
    {
    	return User::all();
    }

    public function getUser($id)
    {
    	return User::find($id);
    }

    public function create($request)
    {
        return User::create($request->only('name','email','password'));
    }

    public function destroy($id)
    {
        User::destroy($id);
    }
}
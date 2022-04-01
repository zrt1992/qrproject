<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * list down all users that are registerd in the app
     */
    public function index(){
    	return view('admin.users.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrController extends Controller
{
    /**
     * list all the qr from database
     */
    public function index(){
    	return view('admin.qr.index');
    }

    /**
     * create Qr code with their description in the database
     */
    public function create(){
    	return view('admin.qr.create');
    }

    /**
     * store Qr code with their description in the database
     */
    public function store(){
    	return view('admin.qr.index');
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\QrCodeServiceProvider;


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
        dd('create');
    	return view('admin.qr.create');
    }

    /**
     * store Qr code with their description in the database
     */
    public function store(){
    	return view('admin.qr.index');
    }
    public function generateQrCode()
    {
        $image = QrCode::size(250)->generate('codingdriver.com');
        echo($image);die;


        return view('qr-code');
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
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
        QrCodeServiceProvider::size(500)
            ->format('png')
            ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));

        return view('qr-code');
    }
}

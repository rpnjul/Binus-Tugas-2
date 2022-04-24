<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PegawaiController extends Controller
{
    public function __construct()
    {

    }


    public function index()
    {
        return view('dashboard.pegawai');
    }


    private function checkPermission()
    {
        if(!checkPegawai(auth()->user()->role_id)){
            return false;
        }
        return true;
    }
}

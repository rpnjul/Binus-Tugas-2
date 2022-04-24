<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except(['logout','dashboard']);
    }

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username'  => 'required|exists:users,username',
            'password'  => 'required'
        ],[
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Kata sandi tidak boleh kosong',
            'username.exists'   => 'Username tidak terdaftar',
        ]);
        if (!$validator->fails()) {
            $users = User::where('username', $request->username)->first();
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect()->route($this->checkRole($users->role_id).'.dashboard');
            }
            $validator = ['Username atau Kata sandi salah'];
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function dashboard()
    {
        $users = auth()->user();
        return redirect()->route($this->checkRole($users->role_id).'.dashboard');
    }

    private function checkRole($role){
        switch ($role) {
            default:
            case '1':
                $auth = 'pegawai';
                break;
            case '2':
                $auth = 'manager';
                break;
            case '3':
                $auth = 'sdm';
                break;
        }

        return $auth;
    }

}

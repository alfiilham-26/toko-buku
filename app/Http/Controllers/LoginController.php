<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Login as login;

class LoginController extends Controller
{
    public function index(){
        return view('login/login');
    }

    public function login(Request $request){
        $data = $request->only(['username', 'password']);
        $user = new login;
        $response = $user->index($data['username'], $data['password']);
        $data = $response;
        if($response->isNotEmpty()){
            $request->session()->put('user', $data);
            foreach($data as $data)
                if($data->status === "admin"){
                    return redirect('/Dashboard/admin');
                }
                elseif($data->status === "kasir"){
                    return redirect('/Dashboard/kasir');
                }
                elseif($data->status === "manager"){
                    return redirect('/Dashboard/manager');
                }
        }
        $request->session()
        ->flash('message', 'Login gagal, mohon periksa kembali username dan password yang digunakan.');
        return redirect('/login');
    }
}

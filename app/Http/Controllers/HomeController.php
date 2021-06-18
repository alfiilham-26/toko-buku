<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request){
        $data = $request->session()->get('user', null);
        $user = json_decode($data);
        return view('layout.template')->with('user', $user);
    }
    public function kasir(Request $request){
        $data = $request->session()->get('user', null);
        $user = json_decode($data);
        return view('layout.template_kasir')->with('user', $user);
    }
    public function manager(Request $request){
        $data = $request->session()->get('user', null);
        $user = json_decode($data);
        return view('layout.template_manager')->with('user', $user);
    }
    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
}
}

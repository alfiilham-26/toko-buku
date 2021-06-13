<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
    public function index($username,$password){
        return $user = DB::table('tbl_user')->where(['username'=> $username, 'password'=> $password])->get();   
    }
}

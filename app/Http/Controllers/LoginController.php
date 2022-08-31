<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index($id){
        session(['token' =>$id]);
      return  $token = session()->get('token');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserInterfaceController extends Controller
{
    public function welcome(){
       
        return view('welcome');

    }
}

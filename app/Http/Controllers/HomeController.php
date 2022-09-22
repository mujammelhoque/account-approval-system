<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        if(Auth::user()->access_roll==1){
            return redirect()->route('firstuser');
            }elseif (Auth::user()->access_roll==2) {
                return redirect()->route('seconduser');
    
            }
            else{
                return redirect()->route('login') ;
            }
    }
}

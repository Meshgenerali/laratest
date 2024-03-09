<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use RealRashid\SweetAlert\Facades\Alert;



use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function index() {
    
        return view('home.userpage');
    }

    

    public function redirect() {
        $usertype = Auth::user()->usertype;

        if($usertype == '1') {


            return view('admin.home');


        } else {
      
            return view('home.userpage');
        }
    }

    // function to redirect webauthn authenticated user

    public function redirection() {

        return view('home.userpage');
    }

    
}

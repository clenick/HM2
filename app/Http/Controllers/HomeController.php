<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use User;
use Request;
use Session;
class HomeController extends BaseController
{   
    public function home(){
        $user =User::find(session('Id'));
     
         if(!isset($user))
        {
            return redirect('login');
        }
        else
        {
            return view('home')->with('Nome',$user->Nome);
        }
    }
}

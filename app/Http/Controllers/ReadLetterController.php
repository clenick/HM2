<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use User;
use Letter;
use Session;
use DB;
class ReadLetterController extends BaseController
{   
    public function readLetter(){
        $user =User::find(session('Id'));
        if(!isset($user))
        {
            return redirect('login');
        }
        else
        {
            return view('readLetter')->with('Id',$user->Id);
        }
    }
    public function getYearLetter()
    {
        $user = User::find(session('Id'));
        $letter = $user->letterina()->get();
        return $letter;
    }
    public function getToy($letter_id)
    {   $letter = Letter::find($letter_id);
        $richiesta = $letter->richiesta()->get();
        return $richiesta;
    }

}


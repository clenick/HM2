<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use User;
use Letter;
use Session;
class LetterController extends BaseController
{   
    public function letter(){
        $user =User::find(session('Id'));
        if(!isset($user))
        {
            return redirect('login');
        }
        else
        {
            return view('letter')->with('Id',$user->Id);
        }
    }
    public function createLetter($message,$image){
        
        $user = User::find(session('Id'));
        $year = date("Y");
        $letter = $user->letterina()->where('Anno',$year)->get()->first();
        if($letter)
        { 
            return $letter;
        }
        else
        {
            $l = Letter::create([
                'Bambino' => $user->Id,
                'Testo' =>$message,
                'Immagine' => base64_decode($image),
                'Anno' => $year
            ]);
            return $l->Codice;
        }
    }
    function createRequest($toy)
    {   $user = User::find(session('Id'));
        $year = date("Y");
        $letter = $user->letterina()->where('Anno',$year)->get()->first();
        $letter->richiesta()->attach($toy);
    }

}


<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use Request;
use User;
use Hash;

class RegisterController extends BaseController
{ 
    public function create(){
        $request = request();
        if($this->checkErrors($request) === 0)
        {
            $new = User::create([
                'username' => $request->username,
                'password' => $request->password,
                'email' => $request->email,
                'nome' => $request->name,
                'cognome'=> $request->surname,
                'indirizzo' => $request->address,
                'eta' => $request->age
            ]);

            if($new)
            {   
                Session::put('Id', $new->Id);
                return redirect('home');
            }
            else {
                return redirect('register')->withInput();
            }
        }
        else
        {
            return redirect('signup')->withInput();
        }

    }
    private function checkErrors($data)
    {
        $errors = array();
         
        if (strlen($data['password'])>7                
            && strlen($data['password'])<15             
            && preg_match('`[A-Z]`', $data['password']) 
            && preg_match('`[a-z]`', $data['password']) 
            && preg_match('`[0-9]`', $data['password'])
            )
        {
            echo "Password valida";
        }
        else
        {
            $errors[] = "Caratteri non validi";
            echo "password non valida";
        }
            
        if(strcmp($data['password'], $data['psw_confirm']) != 0)
        {
            $errors[] = "Le password non coincidono";
            echo "Le password non coincidono";
        }

        return count($errors);
    }

    public function checkUsername($query)
    {
        $exists = User::where('Username', $query)->exists();
        return ['exists' => $exists];
    }

    public function index()
    {
        return view('signup');
    }
}

?>
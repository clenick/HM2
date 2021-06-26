<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use User;
use Request;
use Session;
use App\Models\Playlist;
use App\Models\Music;
class PlaylistController extends BaseController
{   
    public function playlist(){
        $user =User::find(session('Id'));
        if(!isset($user))
        {
            return redirect('login');
        }
        else
        {
            return view('playlist')->with('Id',$user->Id);
        }
    }
    public function getPlaylist()
    {
        $user = User::find(session('Id'));
        $playlist = $user->playlist()->get();
        return $playlist;
    }
    public function createPlaylist($n)
    {   
        $user = User::find(session('Id'));
        $p = $user->playlist()->where('Nome',$n)->get()->first();
        //$p = $user->playlist()->get();
       /* $count = 0;
        
        for($i = 0; $i<count($p); $i++)
        {   
            if($p[$i]->Nome == $n){
                $count = $count + 1;
            }
        }
        if($count == 0)
        {   $playlist = Playlist::create([
                'Bambino' => $user->Id,
                'Nome' =>$n
            ]);
            return $playlist->Id_numerico;
        }
        else
        {   $p = $user->playlist()->get()->where('Nome',$n);
            return  $p;
        }*/
        if($p){
            return  $p;
        }
        else{
            $playlist = Playlist::create([
                'Bambino' => $user->Id,
                'Nome' =>$n
            ]);
            return $playlist->Id_numerico;
        }
    }
    public function getTrack($id_playlist)
    {   $playlist = Playlist::find($id_playlist);
        $track = $playlist->music()->get();
        return $track;
    }
    public function deleteTrack($codice)
    {   $track =Music::find($codice);
        $track->delete();
    }
    public function deletePlaylist($codice)
    {   $playlist = Playlist::find($codice);
        $playlist->delete();
        
    }
}
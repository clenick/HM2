<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;


use User;
use Request;
use App\Models\Music;
use App\Models\Playlist;
use Http;
class MusicController extends BaseController
{  public function index(){
        $user =User::find(session('Id'));
        if(!isset($user))
        {
            return redirect('login');
        }
        else
        {
            return view('music')->with('Id',$user->Id);
        }
    }
    public function music($track){
        $data = Http::get('http://ws.audioscrobbler.com/2.0/?method=track.search&track='.$track.'&api_key='.env('LASTFM_APIKEY'));
        if ($data->failed()) abort(500);
        $xml =  simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOWARNING | LIBXML_NOERROR);
        $json = json_encode($xml);
        $result= json_decode($json, true);
        $ArrayJson = array();
        for($i=0; $i<count($result['results']['trackmatches']['track']);$i++)
            $ArrayJson[] = array('name' => $result['results']['trackmatches']['track'][$i]['name'],'artist' => $result['results']['trackmatches']['track'][$i]['artist'], 'url' => $result['results']['trackmatches']['track'][$i]['url']);
        
        return response()->json($ArrayJson);
    }
    public function createTrack($title,$link,$artist,$playlist){
        $p = Playlist::find($playlist);
        $track = $p->music()->where("url",base64_decode($link))->get()->first();
        if($track){
            return $track;
        }
        else{
            $music= Music::create([
                'artista' => $artist,
                'titolo' => $title,
                'url' => base64_decode($link),
                'playlist' => $playlist
            ]);
            return $music ->Codice;
        }
        /*$track = $p->music()->get();
        $count = 0;
        for($i=0; $i<count($track);$i++)
        {
            $url =  base64_decode($link);
            if($track[$i]->url == $url)
            {
               $count = $count +1;
            }
        }
        if($count == 0)
        {   $music= Music::create([
                'artista' => $artist,
                'titolo' => $title,
                'url' => base64_decode($link),
                'playlist' => $playlist
            ]);
            return $music ->Codice;
        }
        else
        {
            return $p->music()->get()->where('url',base64_decode($link));
        }*/
       
    }

}
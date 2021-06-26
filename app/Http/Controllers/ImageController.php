<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User; 
use Illuminate\Routing\Controller as BaseController;

class ImageController extends BaseController
{  public function unsplash() 
    {
        $json = Http::get('https://api.unsplash.com/search/photos', [
            'per_page' => 20,
            'content_filter'=>'high',
            'client_id' => env('UNSPLASH_APIKEY'),
            'query' => 'christmas',
            'orientation'=>'landscape'
        ]);
        if ($json->failed()) abort(500);

        $newJson = array();
        for ($i = 0; $i < count($json['results']); $i++) {
            $newJson[] = array('preview' => $json['results'][$i]['urls']['thumb']);
        }

        return response()->json($newJson);
    }
}

?>
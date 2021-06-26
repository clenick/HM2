<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Toy;
use DB;

class ToyController extends BaseController
{    public function toy()
    {
        $toys = Toy::all();

        return $toys;
    }
    public function toyCategory()
    {  
        $category = DB::select("SELECT DISTINCT categoria FROM giocattolo ORDER BY categoria ASC");
        return $category;
    }
    public function getToybyCategory($category)
    {
        $toy =Toy::where("Categoria", $category)->orderBy("Nome")->get();
        return $toy;
    }
}

?>
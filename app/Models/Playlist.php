<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Music;
class Playlist extends Model
{
    protected $table='playlist';
    protected $primaryKey='Id_numerico';
    protected $fillable = [
        'Nome','Bambino'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function music(){
        return $this -> hasMany('App\Models\Music','playlist');
    }
}
?>
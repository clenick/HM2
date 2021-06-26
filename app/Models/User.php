<?php

use Illuminate\Database\Eloquent\Model;
use App\Models\Playlist;
use App\Models\Letter;
class User extends Model
{
    protected $table='bambino';
    protected $primaryKey='Id';
    protected $hidden=['password'];
    protected $fillable = [
        'username', 'password', 'email', 'nome', 'cognome', 'indirizzo', 'eta'
    ];
    public function playlist(){
        return $this -> hasMany('App\Models\Playlist','Bambino');
    }
    public function letterina(){
        return $this -> hasMany('Letter','Bambino');
    }
}
?>
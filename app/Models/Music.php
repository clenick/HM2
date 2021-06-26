<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Music extends Model
{
    protected $table='canzone';
    protected $primaryKey='Codice';
    protected $fillable = [
        'artista','titolo','url','playlist'
    ];
    public function playlist()
    {
        return $this->belongsTo('App\Models\Playlist');
    }
}
?>
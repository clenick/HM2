<?php

use Illuminate\Database\Eloquent\Model;
class Letter extends Model
{
    protected $table='letterina';
    protected $primaryKey='Codice';
    protected $fillable = [
        'Bambino','Testo','Immagine','Anno'
    ];
    public function user()
    {
        return $this->belongsTo('User');
    }
    public function richiesta()
    {
        return $this->belongsToMany("App\Models\Toy", 'richiesta', 'letterina', 'giocattolo'); 
    }

}
?>
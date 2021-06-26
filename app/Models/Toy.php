<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Toy extends Model
    {
        protected $table = 'giocattolo';
        protected $primaryKey='Codice';
        
        public function richiesta()
        {
            return $this->belongsToMany("App\Models\Letter", 'richiesta', 'giocattolo', 'letterina');
        }
    }

?>
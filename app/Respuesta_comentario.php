<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta_comentario extends Model
{
   protected $table='respuesta_comentario';
   protected $primaryKey='idrespuesta_comentario'; 
   public $timestamps= false; 

   public function comentario(){
        return $this->belongsTo('App\Comentario', 'idcomentario','idcomentario');
    }
    public function user(){
   	  return $this->belongsTo('App\User', 'users_id', 'id');
    }
}

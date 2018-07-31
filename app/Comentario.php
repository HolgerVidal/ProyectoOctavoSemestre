<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    
   protected $table='comentario';
   protected $primaryKey='idcomentario'; 
   public $timestamps= false;  


   public function user(){
   	  return $this->belongsTo('App\User', 'users_id', 'id');
    }
    
   public function respuesta_comentario(){
        return $this->hasMany('App\Respuesta_comentario', 'idcomentario','idcomentario');
    }

}

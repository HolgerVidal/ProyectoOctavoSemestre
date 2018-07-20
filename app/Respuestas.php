<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    //
    protected $table = 'respuesta';
    protected $primaryKey = 'idrespuesta';
    public $timestamps=false;
    
    protected $fillable = [
        'idrespuesta','users_id','idforo', 'detalle','fecha','users_idRes','esRes','estado_del'
    ]; 
}
 
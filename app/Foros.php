<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foros extends Model
{
    //
    protected $table = 'foro';
    protected $primaryKey = 'idforo';
    public $timestamps=false;
    
    protected $fillable = [
        'idforo','users_id','tema', 'fecha','estado_del'
    ]; 


}

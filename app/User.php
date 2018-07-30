<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idtipo_usuario','idpersona','img','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function comentario(){
        return $this->hasMany('App\Comentario', 'users_id','id');
    }
     public function respuesta_comentario(){
        return $this->hasMany('App\Respuesta_comentario', 'id','users_id');
    }
    public function respuestas(){
        return $this->hasMany('App\Respuestas', 'users_id','id');
    }
}
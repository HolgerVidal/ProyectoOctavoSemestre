<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Persona;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
           // 'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // registramos los datos de la persona
        $persona = new Persona();
        $persona->nombres=$data['nombres'];
        $persona->apellidos=$data['apellidos'];
        $persona->cedula=$data['cedula'];
        $persona->sexo=$data['sexo'];
        $persona->institucion=$data['institucion'];
        $persona->pais=$data['pais'];
        $persona->fecha_nacimiento=$data['fecha_nacimiento'];

        $persona->save();
        // creamos un nombre de usuario en base el primer nombre
        // y el primer apellido del usuario
            list($n1) = explode(' ',$persona->nombres);
            list($n2) = explode(' ', $persona->apellidos);
        // una vez registrados los dato de la persoan
        // procedemos a crear el usuario
        return User::create([
            'idtipo_usuario' => '2',
            'idpersona' => $persona->idpersona,
            'img' => "avatar/0.png",
            'name' => $n1.$n2,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

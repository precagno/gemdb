<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Custom\CustomResponse;
//use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers,ThrottlesLogins,CustomResponse;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [////////se agregaron los campos last_name,username
            'name'          =>      'required|max:255',
            'last_name'     =>      'required|max:255',
            'username'      =>      'required|max:255|unique:users',
            'email'         =>      'required|email|max:255|unique:users',
            'password'      =>      'required|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    /*-- Sobreescrito del mètodo original postRegister --*/
    public function postRegister(Request $request) 
    {   
        $this->middleware("not_ajax");
        
        $validator=$this->validator($request->all());

        if ($validator->fails())
        {   
            return $this->json_fail_response("Error de validaciòn",$validator->errors()->all());    
        }
        
        User::create($request->all());
        
        return $this->json_success_response("Èxito","Usuario registrado correctamente");
    }
    
    /*-- Sobreescrito del mètodo original getFailedLoginMessage --*/
    public function getFailedLoginMessage()
    {
        return "El nombre de usuario/email y o contraseña no son correctos";    
    }
    
    public function authenticated(Request $request,$user)
    {
        \Session::flash("success_message","El Usuario/a {$user->username} fuè exitosamente logueado");
        
        return redirect()->intended($this->redirectPath());
    }   
}
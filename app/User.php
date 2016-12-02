<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','last_name', 'username','email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    /*-- Relationship con el modelo comment --*/
    public function comment()
    {
        return $this->hasOne("App\Comment","user_id","id");
    }
    
    /*-- Relationship con el modelo profile --*/
    public function profile()
    {
        return $this->hasOne("App\Profile","user_id","id");    
    }
    
    /*-- Metodo que trae datos de los usuarios y sus relaciones --*/
    public static function getUsers()
    {
        return User::with("profile")->get();
    }
    
    /*-- Trae los datos de un usuario por id --*/
    public static function getUser($id)
    {
        return User::with("profile")->findOrFail($id);
    }
    
}
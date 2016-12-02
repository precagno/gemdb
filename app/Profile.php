<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table="profiles";
    
    protected $primaryKey="id_profile";
    
    protected $fillable=["email","biography","image","user_id"];
    
}

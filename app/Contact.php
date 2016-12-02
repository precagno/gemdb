<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table="contact";
    
    protected $primaryKey="id_contact";
    
    protected $fillable=["name","last_name","email","subject","content","ip"];
}

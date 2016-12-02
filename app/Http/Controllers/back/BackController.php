<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Comment;

class BackController extends Controller
{
    
    public function __construct()
    {
        //$this->middleware("auth");
    }
    
    public function getIndex()
    {     
        return view("back.home",
        [
            "members"=>User::getUsers(),
            
            "last_comments"=>Comment::last_comments(),            
        ]);
    }
    
}

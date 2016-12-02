<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table="comments";
    
    protected $primaryKey="id_comment";
    
    protected $fillable=["content","user_id","post_id","ip"];
    
    /*-- Relacion uno con uno con la tabla users --*/
    public function user()
    {
        return $this->belongsTo("App\User","user_id","id");
    }
    
    public function post()
    {
        return $this->belongsTo("App\Post","post_id","id_post");
    }
    
    public static function last_comments()
    {
        return Comment::take(5)->orderBy("id_comment","DESC")->get();        
    }
    
}

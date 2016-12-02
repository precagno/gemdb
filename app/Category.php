<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";
    
    protected $primaryKey="id_category";
    
    protected $fillable=["name","description"];
    
    /*-- Retorna la relacion Category->Post --*/
    public function Posts()
    {
        return $this->belongsTo("App\Post");
    }
    
    /*-- Retorna el numero de id de una categoria --*/
    public static function getCategoryID($category)
    {
        return Category::where("name",$category)->first()->id_category;
    }
    
    /*-- Retorna una colecciòn de categorias sin filtrar --*/
    public static function getCategories()
    {
        return Category::all();
    }
}
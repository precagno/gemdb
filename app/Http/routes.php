<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*-- Redirecciona a la seccion de posts --*/
Route::get("/",function()
{
    return redirect()->route("home.index");
});

/*-- Todas las rutas relacionadas al front end --*/
Route::group(["namespace"=>"blog"],function()
{
    /*-- Muestra lista de posts en el home --*/
    Route::get("home",["uses"=>"BlogController@getIndex","as"=>"home.index"]);

    /*-- Muestra un post en detalle --*/
    Route::get("posts/{title}",["uses"=>"BlogController@getPost","as"=>"home.post"]);
    
    /*-- Muestra posts relacionados a una categoria en particular --*/
    Route::get("categoria/{category}",["uses"=>"BlogController@getPostsByCategory","as"=>"home.postsByCategory"]);

    /*-- Busca y muestra posts de acuerdo a un criterio de busqueda --*/
    Route::get("buscar",["uses"=>"BlogController@getSearch","as"=>"home.search"]);
});

Route::group(["namespace"=>"back"],function()
{   
    Route::resource('comentarios','CommentController');
    
    Route::resource('contacto','ContactController',["only"=>["create","store"]]);
    
    Route::group(["prefix"=>"admin"],function()
    {
        Route::get("inicio",["uses"=>"BackController@getIndex","as"=>"admin.index"]);
        
        Route::resource("post","PostController");
        
    });
    
});

// Authentication routes...
Route::get('auth/login',['uses'=>'Auth\AuthController@getLogin','as'=>'login']);

Route::post('auth/login','Auth\AuthController@postLogin');

Route::get('auth/logout',['uses'=>'Auth\AuthController@getLogout','as'=>'logout']);

// Registration routes...
//Route::get('auth/register','Auth\AuthController@getRegister');

Route::post('auth/register',['uses'=>'Auth\AuthController@postRegister','as'=>'register']);
<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Custom\CustomResponse;
use App\Post;
use App\Category;

class PostController extends Controller
{
    
    use CustomResponse;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $posts=Post::getPostsList(1,null,5,"asc");
        
        return view("back/list_posts",["posts"=>$posts]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $categories=Category::getCategories();
                
        return view("back/create_post",["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(!$request->has("image"))
        {
            $request->merge(["image"=>"devices.png"]);
        }
        
        $rules=
        [
            "title"=>"required",
            "image"=>"required",
            "preview"=>"required|min:10|max:140",
            "content"=>"required",
            "category_id"=>"required",
        ];
        
        $validator=\Validator::make($request->all(),$rules);
        
        if($validator->fails())
        {
            return $this->json_fail_response("Error de validacion",$validator->errors()->all());
        }
        
        Post::create($request->all());
        
        return $this->json_success_response("Èxito","Post creado correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
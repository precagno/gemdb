<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Comment;

use \Illuminate\Auth\Guard;

use App\Custom\CustomResponse;

class CommentController extends Controller
{
    
    use CustomResponse;
    
    public function __construct()
    {
        $this->middleware("not_ajax");    
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()///no lo uso
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request,Guard $user)
    {
        
        $rules=["content"=>"required|min:10"];

        $validator= \Validator::make($request->all(),$rules);
        
        if($validator->fails())
        {
            return $this->json_fail_response("Error al validar",$validator->errors()->all());
        }else
        {
            
            if($user->check())
            {
                $user_id=$user->user()->id;
            }else
            {
                $user_id=2;
            }

            Comment::create([
                "content"           =>          $request->get("content"),
                "post_id"           =>          $request->get("post_id"),
                "user_id"           =>          $user_id,
                "ip"                =>          $request->ip(),
            ]);

            return $this->json_success_response("Exito","Comentario creado correctamente , pendiente de aprobaciòn");
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
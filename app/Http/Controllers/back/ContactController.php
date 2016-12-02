<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Custom\CustomResponse;

use App\Contact;

class ContactController extends Controller
{
    
    use CustomResponse;
    
    public function __construct()
    {
        return $this->middleware("not_ajax",["only"=>"store"]);    
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("front.contact");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {   
        
        $rules=[
            
            "name"=>"required",
            
            "last_name"=>"required",
            
            "email"=>"required|email"
            
        ];
        
        $validator=\Validator::make($request->all(),$rules);
        
        if($validator->fails())
        {
            return $this->json_fail_response("Errores de validaciòn",$validator->errors()->all());
        }
        
        $this->sendEmail($request,"email.contact");
        
        Contact::create($request->all());
        
        return $this->json_success_response("Exito","correcto");
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
    
    private function sendEmail($request,$view)
    {
        $data=$request->only(["name","last_name","subject","email","content"]);
        
        return \Mail::send($view,["data"=>$data],function($message) use($request)
        {   
            $message->from($request->get("email"),$request->get("name")." ".$request->get("last_name"));
            
            $message->to(env("CONTACT_MAIL"),env("CONTACT_NAME"));
            
            $message->subject($request->get("subject"));
        });
    }
    
}
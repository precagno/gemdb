<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Custom\CustomTestMethods;

class CommentsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    use WithoutMiddleware,CustomTestMethods;
    
    public function testCreateComment()
    {
        $this->post("/comentarios",$this->getData(),$this->madeCallAjax())->seeJson(["state"=>true]);
    }
   
    private function getData()
    {
        return
        [    
            "content"           =>          "Contenido",
            "post_id"           =>          2,
            "user_id"           =>          2,
            "ip"                =>          12121,
        ];
        
    }
    
}
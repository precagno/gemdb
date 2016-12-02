<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Custom\CustomTestMethods;

class ContactTest extends TestCase
{
    use WithoutMiddleware,CustomTestMethods;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    
    public function testAlgo()
    {
        $this->assertTrue(true);
    }
    
    /*public function testContact()
    {
        $this->post("/contacto",$this->getData(),$this->madeCallAjax())->seeJson(["state"=>true]);
    }
    
    private function getData()
    {
        
        return [
            
            "name"=>"Pablo",
            
            "last_name"=>"Santiago",
            
            "email"=>"precagno@gmail.com",
            
            "subject"=>"Asunto del mail",
            
            "content"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            
            "ip"=>"127.1.1.1"
            
        ];
        
    }*/
}

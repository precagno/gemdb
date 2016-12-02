<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Custom\CustomTestMethods;

class PostTest extends TestCase
{
    
    use CustomTestMethods;
    
    public function testRegisterUser()
    {
        $this->post("/admin/post",$this->getData(),$this->madeCallAjax())->seeJson(["state"=>true]);
    }
    
    private function getData()
    {
                      
        return
        
        [
           
        ];
        
    }
    
}

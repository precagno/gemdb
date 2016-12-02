<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Custom\CustomTestMethods;

class RegisterTest extends TestCase
{
    
    use WithoutMiddleware,CustomTestMethods;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegisterUser()
    {
        $this->post("/auth/register",$this->getData(),$this->madeCallAjax())->seeJson(["state"=>true]);
    }
    
    private function getData()
    {
        
        return[
            
            "name"          =>      "John",
            
            "last_name"     =>      "Mcroe",
            
            "username"      =>      "jmacnroe",
            
            "email"         =>      "jmacnroe@gmail.com",
            
            "password"      =>      "123456",
            
        ];
        
    }
    
}
<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    
    use WithoutMiddleware;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $response=$this->call("POST","/auth/register");
        
        $this->assertEquals(200,$response->status());
    }
    
    private function getData()
    {
        
        return [
            
            "email"=>"precagno@gmail.com",
            
            "password"=>"123456"
            
        ];
        
    }
}

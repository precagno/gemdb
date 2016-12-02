<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(User::class)->create([
            
            'name'              =>  "Pablo",
            'last_name'         =>  "Recagno",
            'username'          =>  "Precagno",
            'email'             =>  "precagno@gmail.com",
            'password'          =>  \Hash::make("123456"),
            'type'              =>  "admin",
            'active'            =>  true,
            'remember_token'    =>  str_random(10),
            
        ]);
        
        factory(User::class)->create([
            
            'name'              =>  "Invitado",
            'last_name'         =>  "Invitado",
            'username'          =>  "Invitado",
            'email'             =>  "guest@mail.com",
            'password'          =>  \Hash::make("123456"),
            'type'              =>  "user",
            'active'            =>  true,
            'remember_token'    =>  str_random(10),
            
        ]);
        
        factory(User::class,4)->create();
        
    }
}
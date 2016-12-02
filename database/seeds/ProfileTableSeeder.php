<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Profile::class)->create(["user_id"=>1]);
        
        factory(App\Profile::class)->create(["user_id"=>2]);
        
        factory(App\Profile::class)->create(["user_id"=>3]);
        
        factory(App\Profile::class)->create(["user_id"=>4]);
        
        factory(App\Profile::class)->create(["user_id"=>5]);
        
        factory(App\Profile::class)->create(["user_id"=>6]);

    }
}

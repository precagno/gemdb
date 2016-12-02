<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class)->create([
            
            "name"=>"actualidad"
            
        ]);
        
        factory(App\Category::class)->create([
            
            "name"=>"tecno"
            
        ]);
    }
}

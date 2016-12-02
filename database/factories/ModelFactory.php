<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'name'              =>  $faker->name,
        'last_name'         =>  $faker->lastName,
        'username'          =>  $faker->unique()->userName,
        'email'             =>  $faker->unique()->email,
        'password'          =>  \Hash::make(str_random(10)),
        'type'              =>  $faker->randomElement(config("options.types")),
        'active'            =>  $faker->randomElement([true,false]),
        'remember_token'    =>  str_random(10),
    ];
});

$factory->define(App\Category::class, function ($faker) {
    return [
        'name'              =>  $faker->unique()->name,
        'description'       =>  $faker->sentence(rand(3,5)),
    ];
});

$factory->define(App\Post::class, function ($faker) {
    return [
        'title'             =>  str_replace(".","",$faker->sentence(rand(3,10))),
        'image'             =>  $faker->randomElement(["devices.png","mantenimiento.jpg","teclado.jpg"]),
        'preview'           =>  $faker->paragraph(rand(1,3)),
        'content'           =>  $faker->paragraph(rand(8,15)),
        'user_id'           =>  rand(1,6),
        'views'             =>  rand(0,1000),
        'active'            =>  $faker->randomElement([true,false]),
        'category_id'       =>  rand(1,2),
    ];
});

$factory->define(App\Comment::class, function ($faker) {
    return [
        'content'           =>  $faker->paragraph(rand(1,4)),
        'user_id'           =>  rand(1,6),
        'post_id'           =>  rand(1,10),
        'ip'                =>  $faker->ipv4,
        'active'            =>  rand(0,1),
    ];
});

$factory->define(App\Profile::class, function ($faker) {
    return [
        'email'           =>    $faker->email(),
        'biography'       =>    $faker->paragraph(rand(1,3)),
        'image'           =>    "sarasa.jpg",
        'user_id'         =>    rand(1,6),

    ];
});

////Categories=2
////Comments=20
////Users=6
////Posts=100
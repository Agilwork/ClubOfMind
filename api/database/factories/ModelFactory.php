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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = app('hash')->make('secret'),
        'cellphone' => $faker->phoneNumber,
        'avatar' => 'none.jpg'
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'text' => $faker->text(),
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        }
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
        'url' => $faker->url(),
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
        'comment_id' => function () {
            return factory(\App\Comment::class)->create()->id;
        }
    ];
});


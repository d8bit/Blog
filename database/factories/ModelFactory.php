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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    $rand = $faker->numberBetween(1,2);
    $imageUrl = '';
    if (1 == $rand) {
        $imageUrl = $faker->imageUrl;
    }
    return [
        'image' => $imageUrl,
        'date' => date('Y-m-d H:i:s')
    ];
});

$factory->define(App\Models\PostTranslation::class, function (Faker\Generator $faker) {
    return [
        'language_id' => $faker->numberBetween(1, 2),
        'title' => $faker->sentence,
        'body' => $faker->paragraph
    ];
});

$factory->define(App\Models\Language::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->languageCode
    ];
});

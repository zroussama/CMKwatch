<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Author;



/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ArticlesWithRelationship::class, function (Faker\Generator $faker) {
    if (Author::count() > 0) {
        $author = Author::inRandomOrder()->first();
    }

    return [
        'title' => $faker->sentence,
        'perex' => $faker->text(),
        'published_at' => $faker->date(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'author_id' => isset($author) ? $author->id : null,


    ];
});


/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {
    if (\Brackets\AdminAuth\Models\AdminUser::count() > 0) {
        $author = \Brackets\AdminAuth\Models\AdminUser::inRandomOrder()->first();
    }

    return [
        'title' => $faker->sentence,
        'perex' => $faker->text(),
        'published_at' => $faker->date(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'updated_by_admin_user_id' => isset($author) ? $author->id : 1,

    ];
});



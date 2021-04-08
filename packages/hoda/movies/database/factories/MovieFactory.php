<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\Hoda\Movies\Models\Movie::class, function (Faker $faker) {
    return [
        "third_party_id" =>1,
        "popularity"=>1,
        "release_date" => '2021-01-01',
        "title" => "The God Father",
        'vote_average' =>'8.0',
        "vote_count" => 1000

    ];
});


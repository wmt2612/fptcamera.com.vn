<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Rating\Entities\Rating;

$factory->define(\Modules\Rating\Entities\Rating::class, function (Faker $faker) {
    return [
        Rating::CUSTOMER_NAME => $faker->firstName,
        Rating::CUSTOMER_PHONE => '0357888999',
        Rating::CUSTOMER_EMAIL => $faker->email,
        Rating::CUSTOMER_GENDER => 'male',
        Rating::REVIEW => $faker->realText(50),
        Rating::TYPE => 1,
        Rating::RATING => rand(1, 5),
        Rating::STATUS => Rating::APPROVED,
    ];
});

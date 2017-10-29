<?php

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Specialist;
// use App\Models\Order;
// use App\Models\OrderItem;
// use App\Models\Partner;
// use App\Models\SocialUser;
// use App\Models\Store;
// use App\Models\User;
// use App\Models\VegetableCategory;
// use App\Models\Vegetable;
// use App\Models\Trunk;
// use App\Models\TrunkStatus;

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

/**
    $faker->addProvider(new Faker\Provider\en_US\Person($faker));
    $faker->addProvider(new Faker\Provider\en_US\Address($faker));
    $faker->addProvider(new Faker\Provider\en_US\PhoneNumber($faker));
    $faker->addProvider(new Faker\Provider\en_US\Company($faker));
    $faker->addProvider(new Faker\Provider\en_US\Text($faker));
    $faker->addProvider(new Faker\Provider\Lorem($faker));
    $faker->addProvider(new Faker\Provider\Internet($faker));
    $faker->addProvider(new Faker\Provider\en_US\Payment($faker));
**/

$factory->define(Doctor::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\en_US\PhoneNumber($faker));
    $faker->addProvider(new Faker\Provider\en_US\Text($faker));
    $faker->addProvider(new Faker\Provider\en_US\Person($faker));

    return [
        'hospital_id' => function() {
            return factory(Hospital::class)->create()->id;
        },
        'specialist_id' => function() {
            return factory(Specialist::class)->create()->id;
        },
        'name' => $faker->name,
        'avatar' => $faker->imageUrl(100, 100),
        'info' => $faker->realText(),
        'examination_fee' => $faker->numberBetween(2, 8) * 50000,

    ];
});

$factory->define(Hospital::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\en_US\Company($faker));
    $faker->addProvider(new Faker\Provider\en_US\Text($faker));
    $faker->addProvider(new Faker\Provider\en_US\Address($faker));
    return [
        'name' => $faker->company(),
        'image' => $faker->imageUrl(100, 100),
        'address' => $faker->address(),
        'description' => $faker->realText(),
    ];
});

$factory->define(Specialist::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\en_US\Company($faker));
    $faker->addProvider(new Faker\Provider\en_US\Text($faker));
    return [
        'name' => $faker->jobTitle(),
        'description' => $faker->realText(),
    ];
});

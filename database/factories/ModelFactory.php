<?php

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Specialist;

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
    $name = $faker->name;
    return [
        'hospital_id' => function() {
            return factory(Hospital::class)->create()->id;
        },
        'specialist_id' => function() {
            return factory(Specialist::class)->create()->id;
        },
        'name' => $name,
        'avatar' => $faker->imageUrl(100, 100),
        'info' => $faker->realText(),
        'examination_fee' => $faker->numberBetween(2, 8) * 50000,
        'slug' => make_slug($name),
    ];
});

$factory->define(Hospital::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\en_US\Company($faker));
    $faker->addProvider(new Faker\Provider\en_US\Text($faker));
    $faker->addProvider(new Faker\Provider\en_US\Address($faker));
    $name = $faker->company();
    return [
        'name' => $name,
        'image' => $faker->imageUrl(100, 100),
        'address' => $faker->address(),
        'description' => $faker->realText(),
        'slug' => make_slug($name),
    ];
});

$factory->define(Specialist::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\en_US\Company($faker));
    $faker->addProvider(new Faker\Provider\en_US\Text($faker));
    $name = $faker->jobTitle();
    return [
        'name' => $name,
        'description' => $faker->realText(),
        'slug' => make_slug($name),
    ];
});

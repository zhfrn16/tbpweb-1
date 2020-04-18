<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Staff;
use Faker\Generator as Faker;

$factory->define(Staff::class, function (Faker $faker) {

    $user = factory(\App\Models\User::class)->create(['type' => \App\Models\User::STAFF]);
    $user->assignRole(config('central.system_roles')['staff']);

    return [
        'id' => $user->id,
        'nip' => $user->username,
        'nik' => $faker->numerify('#############'),
        'name' => $faker->name,
        'birthday' => $faker->date(),
        'birthplace' => $faker->city,
        'phone' => $faker->phoneNumber,
    ];
});

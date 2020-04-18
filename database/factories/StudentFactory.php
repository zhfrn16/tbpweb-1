<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Student;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {

    $user = factory(User::class)->create(['type' => User::STUDENT]);
    $user->assignRole(config('central.system_roles')['student']);

    return [
        'id' => $user->id,
        'nim' => $user->username,
        'name' => $faker->name,
        'year' => $faker->numerify('201#'),
        'birthday' => $faker->date(),
        'birthplace' => $faker->city,
        'phone' => $faker->phoneNumber,
    ];
});

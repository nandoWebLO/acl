<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notice;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Notice::class, function (Faker $faker) {
	return [
		'user_id'		=>		1,
		'title'			=>		$faker->name,
		'description'	=>		$faker->text
	];
});

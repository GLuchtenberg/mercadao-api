<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
    return [
        'name'=> $faker->productName,
        'category_id' => $faker->numberBetween(1,2),
        'barcode' => $faker->text(191),
        'description'=> $faker->text(),
        'price'=> $faker->randomFloat(2,5,500),
        'image'=> null,
        'manufacturer'=> $faker->company,
        'measurement_unit'=> 'KG',
        'quantity'=> $faker->numberBetween(0,250)
    ];
});
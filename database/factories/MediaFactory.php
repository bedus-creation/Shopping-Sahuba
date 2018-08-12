<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Media::class, function (Faker $faker) {

    $url = parse_url("https://loremflickr.com/640/480/all?random=".rand(1,100));

    return [
        'type' => 'image',
        'base_url' => $url['scheme'] . '://' . $url['host'],
        'in_json' => json_encode([
            'images' => [
                'small' => $url['path'] . '?' . $url['query'],
                'medium' => $url['path'] . '?' . $url['query'],
                'big' => $url['path'] . '?' . $url['query'],
            ]
        ]),
    ];
});

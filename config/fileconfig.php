<?php


return [
    'product'=>[
        'disk'=> 'public',
        'path'=> 'uploads.products.:id',
        'S' =>[
            'size' => [
                'height' => 350,
                'width' => 350
            ]
        ],
        'M' =>[
            'size' => [
                'height' => 800,
                'width' => 800
            ]
        ],
        'B' =>[
            'size' => [
                'height' => 800,
                'width' => 800
            ]
        ]
    ]
];
<?php

return [
    'Menu' => [
        'menu' => [
            'Daerah' => [
                'active' => 'daerah/*',
                'icon' => 'compass',
                'permissions' => 'admin',
                'menu' => [
                    'Provinsi' => [
                        'url' => 'provinsi',
                        'active' => 'provinsi*',
                    ],
                    'Kabupaten' => [
                        'url' => 'kabupaten',
                        'active' => 'kabupaten*',
                    ],
                    'Kecamatan' => [
                        'url' => 'kecamatan',
                        'active' => 'kecamatan*',
                    ],
                    'Desa' => [
                        'url' => 'desa',
                        'active' => 'desa*',
                    ],
                ],
            ],

        ],
    ],
];

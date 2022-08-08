<?php

return [
    'System' => [
        'order' => 99,
        'menu' => [
            'Database' => [
                'active' => 'backup/*',
                'icon' => 'database',
                'permissions' => 'admin',
                'menu' => [
                    'Backup' => [
                        'url' => 'backup',
                        'active' => 'backup*',
                    ],
                ],
            ],
            'Users' => [
                'route' => 'epicentrum::users.index',
                'active' => 'epicentrum/users/*',
                'icon' => 'user-friends',
                'permissions' => [\Laravolt\Platform\Enums\Permission::MANAGE_USER],
            ],
            'Roles' => [
                'route' => 'epicentrum::roles.index',
                'config' => 'epicentrum/roles/*',
                'icon' => 'user-astronaut',
                'permissions' => [\Laravolt\Platform\Enums\Permission::MANAGE_ROLE],
            ],
            'Settings' => [
                'route' => 'platform::settings.edit',
                'active' => 'platform/settings/*',
                'icon' => 'sliders-v',
                'permissions' => [\Laravolt\Platform\Enums\Permission::MANAGE_SETTINGS],
            ],
        ],
    ],
];

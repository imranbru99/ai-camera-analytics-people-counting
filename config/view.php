<?php

return [
    'paths' => [
        'views' => resource_path('views'),
        'components' => resource_path('views/components'),
        'layouts' => resource_path('views/layouts'),
        'pages' => resource_path('views/pages'),
        'partials' => resource_path('views/partials'),
    ],
    'cache' => [
        'enabled' => env('CACHE_VIEWS', true),
        'path' => storage_path('framework/views'),
    ],
];

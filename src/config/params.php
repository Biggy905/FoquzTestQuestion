<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'env' => getenv('ENV') ?? 'production',
    'locale' => getenv('LOCALE') ?? 'ru',
    'jwt' => [
        'domain' => getenv('JWT_DOMAIN') ?? '',
        'key' => getenv('JWT_KEY') ?? '',
        'expire' => [
            'access' => (int) (getenv('JWT_EXPIRE_ACCESS') ?? 0),
            'refresh' => (int) (getenv('JWT_EXPIRE_REFRESH') ?? 0),
        ],
        'algorithm' => getenv('JWT_ALGORITHM') ?? 'HS256',
    ],
    'bases' => [
        'frontend' => getenv('BASE_URL') ?? '',
    ],
    'app' => [
        'secret' => getenv('APP_SECRET') ?? 'e86e7f4011385f271059b907d77ff090',
    ],
];

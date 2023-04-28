<?php

$db = require __DIR__ . '/db.php';
$params = require __DIR__ . '/params.php';
$container = require __DIR__ . '/container.php';

$config = [
    'id' => 'base-console',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'app\\console\\controllers',
    'controllerMap' => [
        'migrate' => [
            'class' => \yii\console\controllers\MigrateController::class,
            'migrationTable' => 'migrations',
            'migrationPath' => null,
            'migrationNamespaces' => [
                'app\console\migrations',
            ],
        ],
        'fixture' => [
            'class' => \yii\console\controllers\FixtureController::class,
            'namespace' => 'app\console\fixtures',

        ],
    ],
    'components' => [
        'authManager' => [
            'class' => \yii\rbac\DbManager::class,
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'db' => $db,
    ],
    'container' => [
        'singletons' => $container,
        'definitions' => [],
    ],
    'params' => $params,
];

return $config;

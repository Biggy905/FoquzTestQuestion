<?php

require_once __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require __DIR__ .'/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createUnsafeImmutable(
    dirname( __DIR__, 2),
    ['.env'],
    false
);
$dotenv->load();

$env = getenv('ENV');

defined('YII_ENV') or define('YII_ENV', $env);
defined('YII_DEBUG') or define('YII_DEBUG', 'production' !== $env);

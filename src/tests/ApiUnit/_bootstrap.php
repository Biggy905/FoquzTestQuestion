<?php

require_once __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';
require __DIR__ .'/../../vendor/autoload.php';

use Dotenv\Dotenv;

(Dotenv::createUnsafeImmutable(
    dirname(__DIR__, 3),
    ['.env'],
    false
))->load();

$env = getenv('ENV');

defined('YII_ENV') or define('YII_ENV', $env);
defined('YII_DEBUG') or define('YII_DEBUG', 'production' !== $env);

$config = require(__DIR__ . '/../_config/config.php');

(new yii\web\Application($config));
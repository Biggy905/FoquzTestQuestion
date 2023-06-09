<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../config/bootstrap.php';

use yii\web\Application;
use Dotenv\Dotenv;

(Dotenv::createUnsafeImmutable(
    dirname(__DIR__, 2),
    ['.env'],
    false
))->load();

$config = require __DIR__ . '/../config/main.php';

try {
    (new Application($config))->run();
} catch (\yii\base\InvalidConfigException $e) {

}
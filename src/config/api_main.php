<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$route = require __DIR__ . '/routing.php';
$container = require __DIR__. '/container.php';

$config = [
    'id' => 'api-basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\controllers\api',
    'components' => [
        'authManager' => [
            'class' => \yii\rbac\DbManager::class,
        ],
        'request' => [
            'cookieValidationKey' => 'k3wUEV83VnszvjN9HbR-LeCXWzmnNV6n',
            'parsers' => [
                'application/json' => yii\web\JsonParser::class,
            ]
        ],
        'cache' => [
            'class' => yii\caching\FileCache::class,
        ],
        'user' => [
            'class' => webvimark\modules\UserManagement\components\UserConfig::class,
            'identityClass' => \app\models\User::class,
            'enableSession' => false,
            'on afterLogin' => function ($event) {
                \webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
            }
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => yii\swiftmailer\Mailer::class,
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => $route,
        ],

    ],
    'modules' => [
        'user-management' => [
            'class' => webvimark\modules\UserManagement\UserManagementModule::class,
            // 'enableRegistration' => true,
            // Add regexp validation to passwords. Default pattern does not restrict user and can enter any set of characters.
            // The example below allows user to enter :
            // any set of characters
            // (?=\S{8,}): of at least length 8
            // (?=\S*[a-z]): containing at least one lowercase letter
            // (?=\S*[A-Z]): and at least one uppercase letter
            // (?=\S*[\d]): and at least one number
            // $: anchored to the end of the string
            //'passwordRegexp' => '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$',
            // Here you can set your handler to change layout for any controller or action
            // Tip: you can use this event in any module
            'on beforeAction' => function (yii\base\ActionEvent $event) {
                if ($event->action->uniqueId == 'user-management/auth/login') {
                    $event->action->controller->layout = 'loginLayout.php';
                };
            },
        ],
    ],
    'container' => [
        'singletons' => $container,
        'definitions' => [],
    ],
    'params' => $params,
];

return $config;

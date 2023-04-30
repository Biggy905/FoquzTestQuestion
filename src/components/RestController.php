<?php

namespace app\components;

use yii\filters\AccessControl;
use yii\filters\ContentNegotiator;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\web\Response;
use Yii;

abstract class RestController extends \yii\rest\Controller
{
    public $enableCsrfValidation = false;

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::class,
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBearerAuth::class,
            ],
        ];

        $behaviors['access'] = [
            'class' => AccessControl::class,
        ];

        return $behaviors;
    }

    public function response(array $data = []): array
    {
        return [
            'code' => Yii::$app->response->statusCode,
            'data' => $data,
        ];
    }
}

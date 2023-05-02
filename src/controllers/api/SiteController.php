<?php

namespace app\controllers\api;

use app\components\RestController;
use app\services\UserService;
use yii\base\InvalidConfigException;
use yii\filters\AccessControl;
use Yii;

final class SiteController extends RestController
{
    public function __construct(
        $id,
        $module,
        private readonly UserService $service,
        $config = []
    ) {
        parent::__construct($id, $module, $config);

    }

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator']['except'] = [
            'login',
            'index',
            'logout',
        ];

        $behaviors['access'] = [
            'class' => AccessControl::class,
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['login', 'index', 'logout'],
                ],
            ],
        ];

        return $behaviors;
    }

    public function actionIndex(): array
    {
        return $this->response([
            'message' => 'Добро пожаловать!'
        ]);
    }

    public function actionError(): array
    {
        $exception = Yii::$app->errorHandler->exception;

        return $this->response(
            [
                'message' => $exception->getMessage(),
            ]
        );
    }

    /**
     * @throws InvalidConfigException
     */
    public function actionLogin(): array
    {
        $request = $this->request->getBodyParams();

        $token = $this->service->signUser($request);

        return $this->response(['token' => 'Bearer ' . $token]);
    }

    public function actionLogout(): array
    {
        $header = $this->request->headers;

        $this->service->logoutUser($header->get('authorization'));

        return $this->response();
    }
}

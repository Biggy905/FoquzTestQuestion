<?php

namespace app\controllers\api;

use app\components\RestController;
use app\services\PatientsService;
use yii\base\InvalidConfigException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

final class PatientsController extends RestController
{
    public function __construct(
        $id,
        $module,
        private readonly PatientsService $service,
        $config = []
    ) {
        parent::__construct($id, $module, $config);
    }

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();

        $behaviors['access']['rules'] = [
            [
                'allow' => true,
                'actions' => [
                    'item',
                    'list',
                    'create',
                    'update',
                    'delete',
                ],
                'roles' => [
                    '@'
                ],
            ],
        ];

        return $behaviors;
    }

    /**
     * @throws NotFoundHttpException
     * @throws BadRequestHttpException
     */
    public function actionItem(int $id): array
    {
        $patient = $this->service->item($id);

        return $this->response($patient);
    }

    /**
     * @throws BadRequestHttpException
     */
    public function actionList($page, $limit): array
    {
        $patients = $this->service->list($page, $limit);

        return $this->response($patients);
    }

    /**
     * @throws InvalidConfigException
     * @throws BadRequestHttpException
     */
    public function actionCreate(): array
    {
        $request = $this->request->getBodyParams();

        $patient = $this->service->save($request);

        return $this->response($patient);
    }

    /**
     * @throws NotFoundHttpException
     * @throws InvalidConfigException
     * @throws BadRequestHttpException
     */
    public function actionUpdate($id): array
    {
        $request = $this->request->getBodyParams();

        $patient = $this->service->update($id, $request);

        return $this->response($patient);
    }

    /**
     * @throws NotFoundHttpException
     * @throws BadRequestHttpException
     */
    public function actionDelete($id): array
    {
        $this->service->delete($id);

        return $this->response();
    }
}

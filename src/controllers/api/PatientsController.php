<?php

namespace app\controllers\api;

use app\components\RestController;
use app\models\User;
use app\services\PatientsService;
use Yii;

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

    public function actionItem(int $id): array
    {
        $patient = $this->service->item($id);

        return $this->response($patient);
    }

    public function actionList($page, $limit): array
    {
        $patients = $this->service->list($page, $limit);

        return $this->response($patients);
    }

    public function actionCreate(): array
    {
        $request = $this->request->getBodyParams();

        $patient = $this->service->save($request);

        return $this->response($patient);
    }

    public function actionUpdate($id): array
    {
        $request = $this->request->getBodyParams();

        $patient = $this->service->update($id, $request);

        return $this->response($patient);
    }

    public function actionDelete($id): array
    {
        $this->service->delete($id);

        return $this->response();
    }
}

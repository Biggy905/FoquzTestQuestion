<?php

namespace app\controllers\api;

use app\components\RestController;
use app\services\PolyclinicsService;
use Yii;
use yii\base\InvalidConfigException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

final class PolyclinicsController extends RestController
{
    public function __construct(
        $id,
        $module,
        private readonly PolyclinicsService $service,
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
        $polyclinic = $this->service->item($id);

        return $this->response($polyclinic);
    }

    /**
     * @throws BadRequestHttpException
     */
    public function actionList(int $page, int $limit): array
    {
        $polyclinics = $this->service->list($page, $limit);

        return $this->response($polyclinics);
    }

    /**
     * @throws InvalidConfigException
     * @throws BadRequestHttpException
     */
    public function actionCreate(): array
    {
        $request = $this->request->getBodyParams();

        $polyclinic = $this->service->save($request);

        return $this->response($polyclinic);
    }

    /**
     * @throws InvalidConfigException
     * @throws NotFoundHttpException
     * @throws BadRequestHttpException
     */
    public function actionUpdate(int $id): array
    {
        $request = $this->request->getBodyParams();

        $polyclinic = $this->service->update($id, $request);

        return $this->response($polyclinic);
    }

    /**
     * @throws BadRequestHttpException
     * @throws NotFoundHttpException
     */
    public function actionDelete(int $id): array
    {
        $this->service->delete($id);

        return $this->response();
    }
}

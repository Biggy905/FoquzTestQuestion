<?php

namespace app\repositories\databases;

use app\forms\FilterForm;
use app\models\Patient;
use app\models\Polyclinics;
use app\repositories\PolyclinicsRepositoryInterface;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;
use LogicException;

final class PolyclinicsRepository implements PolyclinicsRepositoryInterface
{
    public function findById(int $id): Polyclinics
    {
        $polyclinic = Polyclinics::find()->byId($id)->one();
        if (!$polyclinic) {
            throw new NotFoundHttpException();
        }

        return $polyclinic;
    }

    public function findAll(FilterForm $form): array
    {
        $query = Polyclinics::find();

        $page = $form->page ?? 1;
        $limit = $form->limit ?? 25;

        if ($page < 1) {
            $page = 1;
        }

        if ($limit < 1 || $limit >= 50) {
            $limit = 25;
        }

        if ($page && $limit) {
            $query->limit($limit);
            $query->offset($page * $limit - $limit);
        }

        $query->orderBy(
            [
                'id' => 'SORT_DESC'
            ]
        );

        return $query
            ->all();
    }

    public function findAllOrderByName(FilterForm $form): array
    {
        $query = Polyclinics::find();

        $page = $form->page ?? 1;
        $limit = $form->limit ?? 25;

        if ($page < 1) {
            $page = 1;
        }

        if ($limit < 1 || $limit >= 50) {
            $limit = 25;
        }

        if ($page && $limit) {
            $query->limit($limit);
            $query->offset($page * $limit - $limit);
        }

        $query->orderBy('name');

        return $query
            ->all();
    }

    public function create(Polyclinics $polyclinic): Polyclinics
    {
        if (!$polyclinic->save()) {
            throw new LogicException();
        }

        return $polyclinic;
    }

    public function delete(Polyclinics $polyclinic): void
    {
        if (!$polyclinic->delete()) {
            throw new LogicException();
        }
    }
}

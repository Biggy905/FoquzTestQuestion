<?php

namespace app\repositories\databases;

use app\forms\FilterForm;
use app\models\Patient;
use app\repositories\PatientRepositoryInterface;
use yii\web\NotFoundHttpException;
use LogicException;

final class PatientRepository implements  PatientRepositoryInterface
{
    public function findById(int $id): Patient
    {
        $patient = Patient::find()
            ->byId($id)
            ->joinAll()
            ->one();
        if (!$patient) {
            throw new NotFoundHttpException();
        }

        return $patient;
    }

    public function findAll(FilterForm $form): array
    {
        $query = Patient::find();

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
                'created' => 'SORT_DESC'
            ]
        );

        return $query
            ->all();
    }

    public function create(Patient $patient): Patient
    {
        if (!$patient->save()) {
            throw new LogicException();
        }

        return $patient;
    }

    public function delete(Patient $patient): void
    {
        if (!$patient->delete()) {
            throw new LogicException();
        }
    }
}

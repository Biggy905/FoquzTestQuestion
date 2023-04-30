<?php

namespace app\queries;

use app\models\FormDiseases;
use app\models\Patient;
use app\models\Polyclinics;
use app\models\Statuses;
use app\models\Treatments;
use app\models\User;
use yii\db\ActiveQuery;

final class PatientQuery extends ActiveQuery
{
    public function byId(int $id): ActiveQuery
    {
        return $this
            ->andWhere(
            [
                Patient::tableName() . '.id' => $id,
            ]
        );
    }

    public function joinAll(): ActiveQuery
    {
        return $this
            ->join(
                'FULL JOIN',
                Polyclinics::tableName(),
                Polyclinics::tableName() . '.id=' . Patient::tableName() . '.polyclinic_id'
            )
            ->join(
                'FULL JOIN',
                Treatments::tableName(),
                Treatments::tableName() . '.id=' . Patient::tableName() . '.treatment_id'
            )
            ->join(
                'FULL JOIN',
                Statuses::tableName(),
                Statuses::tableName() . '.id=' . Patient::tableName() . '.status_id'
            )
            ->join(
                'FULL JOIN',
                FormDiseases::tableName(),
                FormDiseases::tableName() . '.id=' . Patient::tableName() . '.form_disease_id',
            );
//            ->join(
//                'FULL JOIN',
//                User::tableName(),
//                User::tableName() . '.id='. Patient::tableName() . '.created_by',
//            )
//            ->join(
//                'FULL JOIN',
//                User::tableName(),
//                User::tableName() . '.id=' . Patient::tableName() . '.updated_by',
//            );
    }
}

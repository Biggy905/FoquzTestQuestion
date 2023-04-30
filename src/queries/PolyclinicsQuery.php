<?php

namespace app\queries;

use app\models\Polyclinics;
use yii\db\ActiveQuery;

final class PolyclinicsQuery extends ActiveQuery
{
    public function byId(int $id): ActiveQuery
    {
        return $this->andWhere(
            [
                Polyclinics::tableName() . '.id' => $id,
            ]
        );
    }
}

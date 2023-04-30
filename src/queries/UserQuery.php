<?php

namespace app\queries;

use app\models\User;
use yii\db\ActiveQuery;

final class UserQuery extends ActiveQuery
{
    public function byId(int $id): ActiveQuery
    {
        return $this->andWhere(
            [
                User::tableName() . '.id' => $id,
            ]
        );
    }

    public function byUser(string $user): ActiveQuery
    {
        return $this->andWhere(
            [
                User::tableName() . '.username' => $user,
            ]
        );
    }
}

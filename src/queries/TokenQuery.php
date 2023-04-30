<?php

namespace app\queries;

use app\models\Token;
use yii\db\ActiveQuery;

final class TokenQuery extends ActiveQuery
{
    public function byToken(string $token): ActiveQuery
    {
        return $this->andWhere(
            [
                Token::tableName() . '.token' => $token,
            ]
        );
    }
}

<?php

namespace app\models;

use app\queries\UserQuery;
use yii\db\ActiveRecord;

final class RestApiUser extends ActiveRecord
{
    public static function tableName()
    {
        return User::tableName();
    }

    public static function find(): UserQuery
    {
        return (new UserQuery(get_called_class()));
    }
}

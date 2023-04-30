<?php

namespace app\models;

use yii\base\Model;
use app\helpers\DateTimeHelpers;
use app\queries\TokenQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

final class Token extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'token';
    }

    public function behaviors(): array
    {
        return [
            'DefaultTimestampBehaviour' => [
                'class' => TimestampBehavior::class,
                'value' => DateTimeHelpers::createDateTime(),
            ],
        ];
    }

    public static function find(): TokenQuery
    {
        return (new TokenQuery(get_called_class()));
    }
}

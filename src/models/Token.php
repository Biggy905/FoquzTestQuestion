<?php

namespace common\entities;

use yii\base\Model;
use app\helpers\DateTimeHelpers;
use app\queries\TokenQuery;
use yii\behaviors\TimestampBehavior;

final class Token extends Model
{
    public static function tableName(): string
    {
        return 'tokens';
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

<?php

namespace app\models;

use app\queries\PolyclinicsQuery;
use Yii;

/**
 * @property int $id
 * @property string $name
 */
class Polyclinics extends \yii\db\ActiveRecord
{
    public static function tableName(): string
    {
        return 'polyclinics';
    }

    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 512],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Название поликлиники',
        ];
    }

    public static function find(): PolyclinicsQuery
    {
        return (new PolyclinicsQuery(get_called_class()));
    }
}

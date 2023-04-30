<?php

namespace app\models;

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
}

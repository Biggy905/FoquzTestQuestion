<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * @property int $id
 * @property string|null $name
 * @property int|null $sort
 *
 * @property Patient[] $patients
 */
class Statuses extends \yii\db\ActiveRecord
{
    public static function tableName(): string
    {
        return 'statuses';
    }

    public function rules(): array
    {
        return [
            [['sort'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sort' => 'Sort',
        ];
    }

    public function getPatients(): ActiveQuery
    {
        return $this->hasMany(Patient::className(), ['status_id' => 'id']);
    }
}

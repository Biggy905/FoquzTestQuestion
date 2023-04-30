<?php

namespace app\models;

use app\queries\FormDiseasesQuery;
use yii\db\ActiveQuery;
use Yii;

/**
 * @property int $id
 * @property string $name
 * @property int|null $sort
 * @property Patient[] $patients
 */
class FormDiseases extends \yii\db\ActiveRecord
{
    public static function tableName(): string
    {
        return 'form_diseases';
    }

    public function rules(): array
    {
        return [
            [['name'], 'required'],
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

    public static function find(): FormDiseasesQuery
    {
        return (new FormDiseasesQuery(get_called_class()));
    }

    public function getPatients(): ActiveQuery
    {
        return $this->hasMany(Patient::className(), ['form_disease_id' => 'id']);
    }
}

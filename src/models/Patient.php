<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * @property int $id
 * @property string $name
 * @property string|null $birthday
 * @property string|null $phone
 * @property string|null $address
 * @property int|null $polyclinic_id
 * @property int|null $treatment_id
 * @property int|null $status_id
 * @property int|null $form_disease_id
 * @property string|null $created
 * @property int|null $created_by
 * @property string|null $updated
 * @property int|null $updated_by
 * @property string|null $diagnosis_date
 * @property string|null $recovery_date
 * @property string|null $analysis_date
 * @property int|null $source_id
 *
 * @property FormDiseases $formDisease
 * @property Patient $source
 * @property Patient[] $patients
 * @property Polyclinics $polyclinic
 * @property Statuses $status
 * @property Treatments $treatment
 * @property User $createdBy
 * @property User $updatedBy
 */
class Patient extends \yii\db\ActiveRecord
{
    public static function tableName(): string
    {
        return 'patients';
    }

    public function rules(): array
    {
        return [
            [
                [
                    'birthday',
                    'created',
                    'updated',
                    'diagnosis_date',
                    'recovery_date',
                    'analysis_date',
                ],
                'safe',
            ],
            [
                [
                    'polyclinic_id',
                    'treatment_id',
                    'status_id',
                    'form_disease_id',
                    'created_by',
                    'updated_by',
                    'source_id',
                ],
                'integer',
            ],
            [
                ['name'],
                'string',
                'max' => 255,
            ],
            [
                ['phone'],
                'string',
                'max' => 50,
            ],
            [
                ['address'],
                'string',
                'max' => 512,
            ],
            [
                ['form_disease_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => FormDiseases::className(),
                'targetAttribute' => [
                    'form_disease_id' => 'id',
                ],
            ],
            [
                ['source_id'],
                'exist', '
                skipOnError' => true,
                'targetClass' => Patient::className(),
                'targetAttribute' => [
                    'source_id' => 'id',
                ],
            ],
            [
                ['polyclinic_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Polyclinics::className(),
                'targetAttribute' => [
                    'polyclinic_id' => 'id'
                ]
            ],
            [
                ['status_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Statuses::className(),
                'targetAttribute' => [
                    'status_id' => 'id',
                ],
            ],
            [
                ['treatment_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Treatments::className(),
                'targetAttribute' => [
                    'treatment_id' => 'id',
                ],
            ],
            [
                ['created_by'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::className(),
                'targetAttribute' => [
                    'created_by' => 'id',
                ],
            ],
            [
                ['updated_by'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::className(),
                'targetAttribute' => [
                    'updated_by' => 'id',
                ],
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'birthday' => 'Дата рождения',
            'phone' => 'Номер телефона',
            'address' => 'Адрес',
            'polyclinic_id' => 'Поликлиника',
            'treatment_id' => 'Форма лечения',
            'status_id' => 'Статус',
            'form_disease_id' => 'Течение болезни',
            'created' => 'Создана',
            'created_by' => 'Создана',
            'updated' => 'Изменена',
            'updated_by' => 'Измененв',
            'diagnosis_date' => 'Диагноз',
            'recovery_date' => 'Выздоровление',
            'analysis_date' => 'Анализ',
            'source_id' => 'От кого заразился',
        ];
    }

    public function getFormDisease(): ActiveQuery
    {
        return $this->hasOne(FormDiseases::className(), ['id' => 'form_disease_id']);
    }

    public function getSource(): ActiveQuery
    {
        return $this->hasOne(Patient::className(), ['id' => 'source_id']);
    }

    public function getPatients(): ActiveQuery
    {
        return $this->hasMany(Patient::className(), ['source_id' => 'id']);
    }

    public function getPolyclinic(): ActiveQuery
    {
        return $this->hasOne(Polyclinics::className(), ['id' => 'polyclinic_id']);
    }

    public function getStatus(): ActiveQuery
    {
        return $this->hasOne(Statuses::className(), ['id' => 'status_id']);
    }

    public function getTreatment(): ActiveQuery
    {
        return $this->hasOne(Treatments::className(), ['id' => 'treatment_id']);
    }

    public function getCreatedBy(): ActiveQuery
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUpdatedBy(): ActiveQuery
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}

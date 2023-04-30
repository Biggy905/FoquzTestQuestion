<?php

namespace app\models;

use app\queries\UserQuery;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\db\ActiveQuery;
use Yii;

/**
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property integer $email_confirmed
 * @property string $auth_key
 * @property string $password_hash
 * @property string $confirmation_token
 * @property string $bind_to_ip
 * @property string $registration_ip
 * @property integer $status
 * @property integer $superadmin
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $logged_at
 */
class User extends \webvimark\modules\UserManagement\models\User
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_BANNED = -1;

    public $gridRoleSearch;
    public $password;
    public $repeat_password;

    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'unique'],
            ['username', 'trim'],

            [['status', 'email_confirmed'], 'integer'],

            ['email', 'email'],
            ['email', 'validateEmailConfirmedUnique'],

            ['bind_to_ip', 'validateBindToIp'],
            ['bind_to_ip', 'trim'],
            ['bind_to_ip', 'string', 'max' => 255],

            ['password', 'required', 'on'=>['newUser', 'changePassword']],
            ['password', 'string', 'max' => 255, 'on'=>['newUser', 'changePassword']],
            ['password', 'trim', 'on'=>['newUser', 'changePassword']],
            ['password', 'match', 'pattern' => Yii::$app->getModule('user-management')->passwordRegexp],

            ['repeat_password', 'required', 'on'=>['newUser', 'changePassword']],
            ['repeat_password', 'compare', 'compareAttribute'=>'password'],
            ['logged_at', 'safe'],
        ];
    }

    public static function getStatusList(): array
    {
        return [
            static::STATUS_ACTIVE   => UserManagementModule::t('back', 'Active'),
            static::STATUS_INACTIVE => UserManagementModule::t('back', 'Inactive'),
            static::STATUS_BANNED   => UserManagementModule::t('back', 'Banned'),
        ];
    }

    public static function find(): UserQuery
    {
        return (new UserQuery(get_called_class()));
    }

    public function getPolyclinic(): ActiveQuery
    {
        return $this->hasOne(Polyclinics::className(), ['id' => 'polyclinic_id']);
    }

    public function attributeLabels(): array
    {
        $labels = parent::attributeLabels();

        $labels['superadmin'] = 'Администратор';
        $labels['polyclinic_id'] = 'Поликлиника';

        return $labels;
    }
}

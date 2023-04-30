<?php

namespace app\models;

use webvimark\helpers\LittleBigHelper;
use webvimark\helpers\Singleton;
use webvimark\modules\UserManagement\components\AuthHelper;
use webvimark\modules\UserManagement\components\UserIdentity;
use webvimark\modules\UserManagement\models\rbacDB\Role;
use webvimark\modules\UserManagement\models\rbacDB\Route;
use webvimark\modules\UserManagement\UserManagementModule;
use Yii;
use yii\base\InvalidConfigException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

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
 */
class User extends \webvimark\modules\UserManagement\models\User
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_BANNED = -1;

    public $gridRoleSearch;
    public $password;
    public $repeat_password;

    public static function getStatusList(): array
    {
        return [
            static::STATUS_ACTIVE   => UserManagementModule::t('back', 'Active'),
            static::STATUS_INACTIVE => UserManagementModule::t('back', 'Inactive'),
            static::STATUS_BANNED   => UserManagementModule::t('back', 'Banned'),
        ];
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

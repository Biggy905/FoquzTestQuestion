<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * @property User|null $user This property is read-only.
 */
class LoginForm extends Model
{
    public string $username;
    public string $password;
    public bool $rememberMe = true;

    private bool $_user = false;


    public function rules(): array
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword(string $attribute, array $params): void
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    public function login(): bool
    {
        $status = false;
        if ($this->validate()) {
            $status = Yii::$app
                ->user
                ->login(
                    $this->getUser(),
                    $this->rememberMe ? 3600*24*30 : 0
                );
        }

        return $status;
    }

    public function getUser(): ?User
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}

<?php

namespace app\forms;

use yii\base\Model;

final class AuthForm extends Model
{
    public string $username;
    public string $password;

    public function rules(): array
    {
        return [
            [['username', 'password'], 'required'],
            ['username', 'string', 'length' => [4, 24]],
        ];
    }
}

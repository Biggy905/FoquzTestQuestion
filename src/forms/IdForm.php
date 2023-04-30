<?php

namespace app\forms;

use yii\base\Model;

final class IdForm extends Model
{
    public $id;

    public function rules(): array
    {
        return [
            [
                'id',
                'integer',
                'min' => 1,
            ]
        ];
    }
}

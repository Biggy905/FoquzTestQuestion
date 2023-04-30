<?php

namespace app\forms;

use yii\base\Model;

final class FilterForm extends Model
{
    public $page;
    public $limit;

    public function rules(): array
    {
        return [
            [
                ['page'],
                'integer',
                'min' => 1,
            ],
            [
                ['limit'],
                'filter',
                'filter' => static function($value) {
                    if ($value < 1 || $value > 50) {
                        $value = 25;
                    }

                    return $value;
                }
            ]
        ];
    }
}

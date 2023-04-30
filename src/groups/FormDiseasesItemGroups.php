<?php

namespace app\groups;

use app\models\FormDiseases;

final class FormDiseasesItemGroups
{
    public static function toArray(FormDiseases $diseases): array
    {
        return [
            'id' => $diseases->id,
            'name' => $diseases->name,
            'sort' => $diseases->sort,
        ];
    }
}

<?php

namespace app\groups;

use app\models\Treatments;

final class TreatmentItemGroups
{
    public static function toArray(Treatments $treatment): array
    {
        return [
            'id' => $treatment->id,
            'name' => $treatment->name,
            'sort' => $treatment->sort,
        ];
    }
}

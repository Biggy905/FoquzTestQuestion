<?php

namespace app\groups;

use app\models\Polyclinics;

final class PolyclinicItemGroups
{
    public static function toArray(Polyclinics $polyclinic): array
    {
        return [
            'id' => $polyclinic->id,
            'name' => $polyclinic->name,
        ];
    }
}

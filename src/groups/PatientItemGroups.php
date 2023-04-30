<?php

namespace app\groups;

use app\models\Patient;

final class PatientItemGroups
{
    public static function toArray(Patient $patient): array
    {
        return [
            'id' => $patient->id,
            'name' => $patient->name,
            'birthday' => $patient->birthday,
            'phone' => $patient->phone,
            'address' => $patient->address,
            'polyclinic' => PolyclinicItemGroups::toArray($patient->polyclinic),
            'treatment' => TreatmentItemGroups::toArray($patient->treatment),
            'status' => StatusesItemGroups::toArray($patient->status),
            'created_at' => $patient->created,
            'updated_at' => $patient->updated,
        ];
    }
}

<?php

namespace app\groups;

final class PatientsListGroups
{
    public static function toArray(array $array): array
    {
        $data = [];
        foreach ($array as $patient) {
            $data[] = PatientItemGroups::toArray($patient);
        }

        return $data;
    }
}

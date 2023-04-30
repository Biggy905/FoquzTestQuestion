<?php

namespace app\groups;

final class PolyclinicListGroups
{
    public static function toArray(array $array): array
    {
        $data = [];
        foreach ($array as $polyclinic) {
            $data[] = PolyclinicItemGroups::toArray($polyclinic);
        }

        return $data;
    }
}

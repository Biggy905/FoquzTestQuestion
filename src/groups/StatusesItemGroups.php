<?php

namespace app\groups;

use app\models\Statuses;

final class StatusesItemGroups
{
    public static function toArray(Statuses $statuses): array
    {
        return [
            'id' => $statuses->id,
            'name' => $statuses->name,
            'sort' => $statuses->sort,
        ];
    }
}

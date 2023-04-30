<?php

namespace app\enums;

enum DateTimeEnums: string
{
    case DATETIME_DATABASE = 'Y-m-d H:i:s';
    case TIME_DATABASE = 'H:i:s';
}

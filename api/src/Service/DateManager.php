<?php

namespace App\Service;

use DateInterval;
use DateTime;

class DateManager
{
    public static function intervalBetweenNowAnd(DateTime $date): DateInterval
    {
        $now = new DateTime();
        return $now->diff($date);
    }

    public static function calculateAge(DateTime $birthday): int
    {
        return self::intervalBetweenNowAnd($birthday)->y;
    }
}

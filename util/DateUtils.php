<?php

namespace util;

class DateUtils
{
    public static $PATTERN_PLAIN_DATE = 'Y/m/d';
    public static $PATTERN_DASHED_DATE = 'Y-m-d';
    public static $PATTERN_SHORT_TIME = 'H:i';
    public static $PATTERN_MYSQL_DATE_TIME = 'Y-m-d h:i:s';

    public static function getPlainDate($date_string)
    {
        echo date(self::$PATTERN_PLAIN_DATE, strtotime($date_string));
    }

    public static function getShortTime($date_string)
    {
        echo date(self::$PATTERN_SHORT_TIME, strtotime($date_string));
    }
}

<?php

namespace util;

class DateUtils
{
    public static $PATTERN_PLAIN_DATE = 'Y/m/d';
    public static $PATTERN_DASHED_DATE = 'Y-m-d';
    public static $PATTERN_SHORT_TIME = 'H:i';
    public static $PATTERN_MYSQL_DATE_TIME = 'Y-m-d h:i:s';

    public static $PATTERN_HOUR = 'H';
    public static $PATTERN_MINUTE = 'i';
    public static $PATTERN_YEAR = 'Y';
    public static $PATTERN_MONTH = 'm';
    public static $PATTERN_DAY = 'd';

    public static function getPlainDate($date_string)
    {
        echo date(self::$PATTERN_PLAIN_DATE, strtotime($date_string));
    }

    public static function getShortTime($date_string)
    {
        echo date(self::$PATTERN_SHORT_TIME, strtotime($date_string));
    }

    public static function getYear($date_string)
    {
        return date(self::$PATTERN_YEAR, strtotime($date_string));
    }

    public static function getMonth($date_string)
    {
        return date(self::$PATTERN_MONTH, strtotime($date_string));
    }

    public static function getDay($date_string)
    {
        return date(self::$PATTERN_DAY, strtotime($date_string));
    }

    public static function getHour($date_string)
    {
        return date(self::$PATTERN_HOUR, strtotime($date_string));
    }

    public static function getMinute($date_string)
    {
        return date(self::$PATTERN_MINUTE, strtotime($date_string));
    }
}

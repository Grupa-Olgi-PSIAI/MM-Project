<?php


namespace util;


class Redirect
{
    public static function to($location)
    {
        header("Location: " . $location);
        exit();
    }
}

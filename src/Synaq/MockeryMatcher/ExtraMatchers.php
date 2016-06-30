<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2016/03/22
 * Time: 09:16
 */

namespace Synaq\MockeryMatcher;


class ExtraMatchers
{
    public static function arrayPath($expected, $path)
    {
        return new ArrayPath($expected, $path);
    }

    public static function jsonPath($expected, $path)
    {
        return new JsonPath(null, null);
    }
}
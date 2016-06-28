<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2016/03/22
 * Time: 09:16
 */

namespace Synaq\MockeryMatcher;


class ExtraMocks
{
    public static function arrayPath($expected, $path)
    {
        return new ArrayPath($expected, $path);
    }
}
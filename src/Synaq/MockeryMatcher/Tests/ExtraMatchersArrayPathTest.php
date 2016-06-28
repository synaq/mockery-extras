<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2016/03/22
 * Time: 09:15
 */

namespace Synaq\MockeryMatcher\Tests;


use Synaq\MockeryMatcher\ExtraMatchers;

class ExtraMatchersArrayPathTest extends \PHPUnit_Framework_TestCase
{
    public function testArrayPathShouldReturnArrayPathMatcher()
    {
        $matcher = ExtraMatchers::arrayPath(null, null);
        $this->assertInstanceOf('\Synaq\MockeryMatcher\ArrayPath', $matcher);
    }

    public function testArrayPathShouldSetValueAndPathOnMatcher()
    {
        $matcher = ExtraMatchers::arrayPath('value', 'some/path');
        $this->assertEquals('<some/path==value>', $matcher->__toString());
    }
}

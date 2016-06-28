<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2016/03/22
 * Time: 09:15
 */

namespace Synaq\MockeryMatcher\Tests;


use Synaq\MockeryMatcher\ExtraMocks;

class ExtraMocksArrayPathTest extends \PHPUnit_Framework_TestCase
{
    public function testArrayPathShouldReturnArrayPathMatcher()
    {
        $matcher = ExtraMocks::arrayPath(null, null);
        $this->assertInstanceOf('\Synaq\MockeryMatcher\ArrayPath', $matcher);
    }

    public function testArrayPathShouldSetValueAndPathOnMatcher()
    {
        $matcher = ExtraMocks::arrayPath('value', 'some/path');
        $this->assertEquals('<some/path==value>', $matcher->__toString());
    }
}

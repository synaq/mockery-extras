<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2016/03/22
 * Time: 09:15
 */

namespace Synaq\MockeryMatcher\Tests;


use PHPUnit\Framework\TestCase;
use Synaq\MockeryMatcher\ExtraMatchers;

class ExtraMatchersArrayPathTest extends TestCase
{
    /**
     * @test
     */
    public function arrayPathShouldReturnArrayPathMatcher()
    {
        $matcher = ExtraMatchers::arrayPath(null, null);
        $this->assertInstanceOf('\Synaq\MockeryMatcher\ArrayPath', $matcher);
    }

    /**
     * @test
     */
    public function arrayPathShouldSetValueAndPathOnMatcher()
    {
        $matcher = ExtraMatchers::arrayPath('value', 'some/path');
        $this->assertEquals('<some/path==value>', $matcher->__toString());
    }
}

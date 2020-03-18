<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2016/06/30
 * Time: 10:31
 */

namespace Synaq\MockeryMatcher\Tests;


use PHPUnit\Framework\TestCase;
use Synaq\MockeryMatcher\ExtraMatchers;

class ExtraMatchersJsonPathTest extends TestCase
{
    /**
     * @test
     */
    public function jsonPathShouldReturnJsonPathMatcher()
    {
        $matcher = ExtraMatchers::jsonPath(null, null);
        $this->assertInstanceOf('\Synaq\MockeryMatcher\JsonPath', $matcher);
    }

    /**
     * @test
     */
    public function jsonPathShouldSetValueAndPathOnMatcher()
    {
        $matcher = ExtraMatchers::jsonPath('value', '$.some.path');
        $this->assertEquals('<$.some.path==value>', $matcher->__toString());
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2016/06/30
 * Time: 10:31
 */

namespace Synaq\MockeryMatcher\Tests;


use Synaq\MockeryMatcher\ExtraMatchers;

class ExtraMatchersJsonPathTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function jsonPathShouldReturnJsonPathMatcher()
    {
        $matcher = ExtraMatchers::jsonPath(null, null);
        $this->assertInstanceOf('\Synaq\MockeryMatcher\JsonPath', $matcher);
    }
}

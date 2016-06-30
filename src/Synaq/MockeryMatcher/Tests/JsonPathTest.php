<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2016/06/30
 * Time: 09:10
 */

namespace Synaq\MockeryMatcher\Tests;


use Synaq\MockeryMatcher\JsonPath;

class JsonPathTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function toStringShouldReturnJsonPathAndExpectedValue()
    {
        $jsonPath = new JsonPath('baz', '$.foo.bar');
        $this->assertEquals('<$.foo.bar==baz>', $jsonPath->__toString());
    }
}

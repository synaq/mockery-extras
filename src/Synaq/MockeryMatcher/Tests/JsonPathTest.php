<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2016/06/30
 * Time: 09:10
 */

namespace Synaq\MockeryMatcher\Tests;


use PHPUnit\Framework\TestCase;
use Synaq\MockeryMatcher\JsonPath;

class JsonPathTest extends TestCase
{
    /**
     * @test
     */
    public function toStringShouldReturnJsonPathAndExpectedValue()
    {
        $jsonPath = new JsonPath('baz', '$.foo.bar');
        $this->assertEquals('<$.foo.bar==baz>', $jsonPath->__toString());
    }

    /**
     * @test
     */
    public function matchShouldReturnFalseIfPathDoesNotExist()
    {
        $json = '{"some": {"existing": {"path": "value"}}}';
        $jsonPath = new JsonPath('any-value', '$.some.nonexistent.path');
        $this->assertFalse($jsonPath->match($json));
    }

    /**
     * @test
     */
    public function matchShouldReturnFalseIfPathExistsButValueIsDifferent()
    {
        $json = '{"some": {"path": "value"}}';
        $jsonPath = new JsonPath('not-value', '$.some.path');
        $this->assertFalse($jsonPath->match($json));
    }

    /**
     * @test
     */
    public function matchShouldReturnTrueIfPathExistsAndValueMatches()
    {
        $json = '{"some": {"path": "value"}}';
        $jsonPath = new JsonPath('value', '$.some.path');
        $this->assertTrue($jsonPath->match($json));
    }
}

<?php

namespace Synaq\MockeryMatcher\Tests;


use Synaq\MockeryMatcher\ArrayPath;

class ArrayPathTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function toStringShouldReturnArrayPathAndExpectedValue()
    {
        $arrayPath = new ArrayPath('value', 'some/path');
        $this->assertEquals('<some/path==value>', $arrayPath->__toString());
    }

    /**
     * @test
     */
    public function matchShouldReturnFalseIfPathDoesNotExist()
    {
        $array = ['other' => ['path' => 'value']];
        $arrayPath = new ArrayPath('value', 'some/path');
        $this->assertFalse($arrayPath->match($array));
    }

    /**
     * @test
     */
    public function matchShouldReturnFalseIfPathExistsButValueIsDifferent()
    {
        $array = ['some' => ['path' => 'value']];
        $arrayPath = new ArrayPath('other value', 'some/path');
        $this->assertFalse($arrayPath->match($array));
    }

    /**
     * @test
     */
    public function matchShouldReturnTrueIfPathExistsAndValueMatchesExpected()
    {
        $array = ['some' => ['path' => 'value']];
        $arrayPath = new ArrayPath('value', 'some/path');
        $this->assertTrue($arrayPath->match($array));
    }
}

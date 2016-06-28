<?php

namespace Synaq\MockeryMatcher\Tests;


use Synaq\MockeryMatcher\ArrayPath;

class ArrayPathTest extends \PHPUnit_Framework_TestCase
{
    public function testToStringShouldReturnArrayPathAndExpectedValue()
    {
        $arrayPath = new ArrayPath('value', 'some/path');
        $this->assertEquals('<some/path==value>', $arrayPath->__toString());
    }

    public function testMatchShouldReturnFalseIfPathDoesNotExist()
    {
        $array = ['other' => ['path' => 'value']];
        $arrayPath = new ArrayPath('value', 'some/path');
        $this->assertFalse($arrayPath->match($array));
    }

    public function testMatchShouldReturnFalseIfPathExistsButValueIsDifferent()
    {
        $array = ['some' => ['path' => 'value']];
        $arrayPath = new ArrayPath('other value', 'some/path');
        $this->assertFalse($arrayPath->match($array));
    }

    public function testMatchShouldReturnTrueIfPathExistsAndValueMatchesExpected()
    {
        $array = ['some' => ['path' => 'value']];
        $arrayPath = new ArrayPath('value', 'some/path');
        $this->assertTrue($arrayPath->match($array));
    }
}

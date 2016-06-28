<?php
/**
 * Created by PhpStorm.
 * User: nicholasp
 * Date: 2016/03/22
 * Time: 8:18 AM
 */

namespace Synaq\MockeryMatcher;


use Mockery\Matcher\MatcherAbstract;
use MathiasGrimm\ArrayPath\ArrayPath as A;

class ArrayPath extends MatcherAbstract
{
    /**
     * @var
     */
    private $path;

    /**
     * ArrayPath constructor.
     * @param mixed|null $expected
     * @param $path
     */
    public function __construct($expected, $path)
    {
        parent::__construct($expected);
        $this->path = $path;
    }

    /**
     * Check if the actual value matches the expected.
     * Actual passed by reference to preserve reference trail (where applicable)
     * back to the original method parameter.
     *
     * @param mixed $actual
     * @return bool
     */
    public function match(&$actual)
    {
        return A::exists($actual, $this->path) && A::get($actual, $this->path) == $this->_expected;
    }

    /**
     * Return a string representation of this Matcher
     *
     * @return string
     */
    public function __toString()
    {
        return "<$this->path==$this->_expected>";
    }
}
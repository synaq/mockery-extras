<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2016/06/30
 * Time: 09:12
 */

namespace Synaq\MockeryMatcher;


use Mockery\Matcher\MatcherAbstract;

class JsonPath extends MatcherAbstract
{
    /**
     * @var
     */
    private $jsonPathSelector;

    public function __construct($expected, $jsonPathSelector)
    {
        parent::__construct($expected);
        $this->jsonPathSelector = $jsonPathSelector;
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
        // TODO: Implement match() method.
    }

    public function __toString()
    {
        return "<$this->jsonPathSelector==$this->_expected>";
    }
}
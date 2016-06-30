<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2016/06/30
 * Time: 09:12
 */

namespace Synaq\MockeryMatcher;


use JsonPath\JsonObject;
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

    public function match(&$actual)
    {
        $json = new JsonObject($actual);
        $actualValue = $json->get($this->jsonPathSelector);
        return ($actualValue == $this->_expected);
    }

    public function __toString()
    {
        return "<$this->jsonPathSelector==$this->_expected>";
    }
}
<?php

class ValidateSpecialChar implements ValidationRuleInterface
{

    private $rule;

    public function __construct($rule = "/[^a-zA-z0-9]+/")
    {
        $this->rule = $rule;
    }

    function validateRule($value)
    {
        // on special character
        if (!preg_match($this->rule, $value)) {
            return false;
        }
        return true;
    }
    function getErrMsg()
    {
        return "Use at least one special character.";
    }
}

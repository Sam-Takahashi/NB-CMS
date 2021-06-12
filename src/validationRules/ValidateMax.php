<?php

class ValidateMax implements ValidationRuleInterface
{

    private $maximum;

    public function __construct($maximum)
    {
        $this->maximum = $maximum;
    }

    function validateRule($value)
    {

        // minmum number of characters
        if (strlen($value) > $this->maximum) {
            return false;
        }
        return true;
    }

    function getErrMsg()
    {
        return "Maximum of" . $this->maximum . "characters.";
    }
}

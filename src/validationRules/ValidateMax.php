<?php

class ValidateMax
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
}

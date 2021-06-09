<?php

class ValidateMin {

    private $minimum;

    public function __construct($minimum)
    {
        $this->minimum = $minimum;
    }

    function validateRule($value){

        // minmum number of characters
        if (strlen($value) < $this->minimum) {
            return false;
        }
        return true;
    }
}
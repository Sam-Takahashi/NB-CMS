<?php

class ValidateEmail
{
    function validateRule($value)
    {

        // minmum number of characters
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
}

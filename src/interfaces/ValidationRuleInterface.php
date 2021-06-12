<?php

interface ValidationRuleInterface {

    public function validateRule($value);
    public function getErrMsg();

}
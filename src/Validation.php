<?php

class Validation
{

    private $rules;
    private $errorMessages = [];

    public function addRule(ValidationRuleInterface $rule)
    {
        $this->rules[] = $rule;
        // by returning $this(addRule) becomes the entire object allowing us to add multiple(chainable) rules in DashboardController($validatus)
        return $this;
    }

    // loops through all set rules and check if return is true
    public function validate($value)
    {
        foreach ($this->rules as $rule) {
            $ruleValidation = $rule->validateRule($value);
            if (!$ruleValidation) {
                $this->errorMessages[] = $rule->getErrMsg();
                return false;
            }
        }

        return true;
    }

    // return all error messages(array?)
    public function getAllErrorMessages()
    {
        return $this->errorMessages;
    }
}

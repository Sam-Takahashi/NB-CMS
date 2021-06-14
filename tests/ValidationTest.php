<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once 'src/interfaces/ValidationRuleInterface.php';
require_once 'src/Validation.php';
require_once 'src/validationRules/ValidateEmail.php';

final class ValidationTest extends TestCase
{
    public function testValidationEmail(): void
    {
        $validationClass = new Validation();
        $validationClass->addRule(new ValidateEmail());

        $this->assertFalse($validationClass->validate('bademail'));
        $this->assertTrue($validationClass->validate('bob@email.com'));
    }
}
//  ./vendor/bin/phpunit tests
//Run with (Cmd+Shift+P on OSX or Ctrl+Shift+P on Windows and Linux) and execute the PHPUnit Test command.
// HELLO GITHUB
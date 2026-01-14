<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class RegisterValidation
{
    public function validating(
        string $username,
        string $email,
        string $password
    ): array {

        $errors = [];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'INVALID_EMAIL';
        }

        // Validation for username (must be alphanumeric)
        if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
            $errors['username'] = 'INVALID_USERNAME';
        }

        // Validate password (between 5-20 characters)
        if (strlen($password) < 5 || strlen($password) > 20) {
            $errors['password'] = 'INVALID_PASSWORD_LENGTH';
        }

        return $errors;
    }
}

class RegisterValidationTest extends TestCase
{
    public function testEmailValidation()
    {
        //Arrange
        $Validation = new RegisterValidation();

        //Act
        $errors = $Validation->validating(
            'JohnDoe',
            'email-/wrong',
            'Passwordcorrect222'
        );

        //Assert
        $this->assertArrayHasKey('email', $errors);
        $this->assertEquals('INVALID_EMAIL', $errors['email']);
    }

    public function testUsernameValidation()
    {
        //Arrange
        $Validation = new RegisterValidation();

        //Act
        $errors = $Validation->validating(
            'John@Doe__!!',
            'john@doe.com',
            'Passwordcorrect222'
        );

        //Assert
        $this->assertArrayHasKey('username', $errors);
    }

    public function testPasswordValidation()
    {
        //Arrange
        $Validation = new RegisterValidation();

        //Act
        $errors = $Validation->validating(
            'JohnDoe',
            'john@doe.com',
            '222'
        );

        //Assert
        $this->assertArrayHasKey('password', $errors);
    }

    public function testSuccessfulRegister()
    {
        //Arrange
        $Validation = new RegisterValidation();

        //Act
        $errors = $Validation->validating(
            'JohnDoe',
            'john@doe.com',
            'Passwordcorrect222'
        );

        //Assert
        $this->assertEmpty($errors);
    }
} 
// To Run test
// php vendor\bin\phpunit tests/unit/RegisterValidationTest.php

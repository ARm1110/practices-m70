<?php

namespace App\core;

use App\core\connection\MedooDatabase;
use App\Models\Doctor;

class Validation extends Controller
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_UNIQUE = 'unique';
    public const RULE_MATCH = 'match';
    public const RULE_RULE = 'rule';
    public string $firstName = '';
    public string $lastName = '';
    public string $email = '';
    public string $rule = '';
    public string $password = '';
    public string $setting = '';
    public string $confirmPassword = '';
    public array $errors = [];

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
        return $this;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be valid email address',
            self::RULE_UNIQUE => 'Record this field is already exist',
            self::RULE_MATCH => 'Password does not match'

        ];
    }
    public function registerRules(): array
    {
        return [
            'firstName' => [self::RULE_REQUIRED],
            'lastName' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'rule' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }
    public function loginRules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
            'setting' => [self::RULE_REQUIRED]
        ];
    }
    public function findOneLogin()
    {
        $user = MedooDatabase::getMedooDatabase()->select('users', '*', ['email' => $this->email]);
        if (!$user) {
            $this->errors['email'][] = 'This email not exist';
            return false;
        }
        if ($user[0]['password'] != $this->password) {
            $this->errors['password'][] = 'Wrong password';
            return false;
        }
        return $user[0];
    }
    public function findOneRegister()
    {
        return  Doctor::do()->select("*", ['email' => $this->email]);
        
    }
    public function validation($validationRules)
    {

        foreach ($validationRules as $attribute => $rules) {

            $value = $this->{$attribute};
           
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addErrorForRule($attribute, self::RULE_REQUIRED);
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addErrorForRule($attribute, self::RULE_EMAIL);
                }
                if ($ruleName === self::RULE_MATCH && $value != $this->{$rule['match']}) {
                    $this->addErrorForRule($attribute, self::RULE_MATCH, $rule);
                }
                if ($ruleName === self::RULE_UNIQUE) {
                    $tableName = 'users';
                    $record = MedooDatabase::getMedooDatabase()->select($tableName, '*', [$attribute => $value]);
                    if ($record) {
                        $this->addErrorForRule($attribute, self::RULE_UNIQUE);
                    }
                }
            }
        }
        return empty($this->errors);
    }
    private function addErrorForRule(string $attribute, string $rule, array $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $key => $value) {
            $message = $this->errorMessages()[$key];
        }

        $this->errors[$attribute][] = $message;
    }

    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }
    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }
}

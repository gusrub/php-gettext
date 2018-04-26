<?php

putenv("APP_LANG=en");
require_once('i18n.php');

class Person
{
    const VERSION = '1.0.0';

    public $firstName;
    public $lastName;
    public $dob;


    function __construct($firstName, $lastName, $dob)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dob = $dob;
    }

    public function printInfo()
    {
        $age = $this->calculateAge();
        echo I18n::translate(
            "Hello my name is {firstName} {lastName} and I'm {age}\n",
            [
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'age' => $age
            ]
        );
    }

    public function goodBye()
    {
        echo I18n::translate("That's it, good bye!\n");
    }

    public function printVersion()
    {
        echo I18n::translate("\n(running version {version})\n",
            [
                'version' => self::VERSION
            ]
        );
    }

    private function calculateAge()
    {
        $dob = date_create($this->dob);
        $now = date_create();
        $age = date_diff($dob, $now)->format("%y");
        $response = null;

        if($age < 18) {
            $response = I18n::translate("{age} years which means I'm a teen",
                [
                    'age' => $age
                ]
            );
        } else {
            $response = I18n::translate("{age} years which means I'm a grown up",
                [
                    'age' => $age
                ]
            );
        }

        return $response;
    }
}

$p = new Person(
    'John',
    'Wayne',
    '1980-01-20'
);
$p->printInfo();
$p->goodBye();
$p->printVersion();

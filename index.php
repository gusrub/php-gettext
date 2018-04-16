<?php

require_once('i18n.php');

use function Helpers\I18n\translate;

class Person
{
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
        echo translate("Hello my name is %s %s and I'm %s\n", $this->firstName, $this->lastName, $age);
    }

    public function goodBye()
    {
        echo translate("That's it, good bye!\n");
    }

    private function calculateAge()
    {
        $dob = date_create($this->dob);
        $now = date_create();
        $age = date_diff($dob, $now)->format("%y");
        $response = null;

        if($age < 18) {
            $response = translate("%s years which means I'm a teen", $age);
        } else {
            $response = translate("%s years which means I'm a grown up", $age);
        }

        return $response;
    }
}

$p = new Person(
    'Gustavo',
    'Rubio',
    '1985-06-19'
);
$p->printInfo();
$p->goodBye();

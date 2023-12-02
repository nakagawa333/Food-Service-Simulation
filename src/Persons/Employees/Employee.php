<?php

namespace Persons\Employees;

use \Persons\Person;

class Employee extends Person
{
    //
    private string $employeeId;
    //
    private int $salary;

    public function __construct(string $name, string $age, string $address, string $employeeId, int $salary)
    {
        parent::__construct($name, $age, $address, $employeeId, $salary);
    }
}

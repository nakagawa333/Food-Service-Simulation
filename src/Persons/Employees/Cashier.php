<?php

namespace Persons\Employees;

class Cashier extends Employee
{
    public function __construct()
    {
        parent::__construct("レジ", 20, "東京都", "test2", 9.25);
    }
}

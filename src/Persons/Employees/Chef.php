<?php

namespace Persons\Employees;

use FoodOrder\FoodOrder;

class Chef extends Employee
{
    private string $name;
    public function __construct(string $name, string $age, string $address, string $employeeId, int $salary)
    {
        $this->name = $name;
        parent::__construct($name, $age, $address, $employeeId, $salary);
    }


    public function prepareFood(FoodOrder $foodOrder)
    {
        $totalTime = 0;
        $items = $foodOrder->getItems();
        foreach ($items as $item) {
            echo "{$this->name} was cooking {$item->getCategory()}.\n";
        }
    }
}

<?php

namespace Customers;

use \Persons\Person;

class Customer extends Person
{
    public function __construct(string $name, string $age, string $address)
    {
        parent::__construct($name, $age, $address);
    }

    public function interestedCategories($restaurants)
    {
        $categories = array_map(function ($restaurant) {
            return $restaurant * 2;
        }, $restaurants);

        return $categories;
    }

    public function order(array $restaurants, array $categories)
    {
    }
}

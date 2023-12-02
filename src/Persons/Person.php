<?php

namespace Persons;

abstract class Person
{
    //名前
    private string $name;
    //年齢
    private int $age;
    //住所
    private string $address;

    public function __construct(string $name, string $age, string $address)
    {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }
}

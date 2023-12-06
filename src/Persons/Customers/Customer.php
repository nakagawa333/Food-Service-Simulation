<?php

namespace Persons\Customers;

use \Persons\Person;

class Customer extends Person
{
    private array $tastesMap;
    private string $name;

    public function __construct(string $name, string $age, string $address, $tastesMap)
    {
        parent::__construct($name, $age, $address);
        $this->tastesMap = $tastesMap;
        $this->name = $name;
    }

    /*
     * ユーザーが興味のあるカテゴリーを取得する
     * @param $restaurant レストランクラス
     */
    public function interestedCategories($restaurant)
    {
        $categories = [];
        $menus = $restaurant->getMenu();
        foreach ($menus as $menu) {
            array_push($categories, $menu->getCategory());
        }

        $msg = "%s wanted to eat ";
        foreach ($this->tastesMap as $key => $value) {
            $msg .= $key . ", ";
        }

        $msg .= "\n";

        $categoriesMap = array_flip($categories);
        $interestedCategories = array_intersect_key($this->tastesMap, $categoriesMap);

        printf($msg, $this->name);
        return $interestedCategories;
    }

    public function order($restaurant)
    {
        $interestedCategories = $this->interestedCategories($restaurant);
        $msg = "%s was looking at the menu, and ordered ";

        foreach ($interestedCategories as $key => $value) {
            $msg .= $key . "×" . $value . ", ";
        }

        $msg .= "\n";

        printf($msg, $this->name);
        //請求書
        $invoice = $restaurant->order($interestedCategories);

        return $invoice;
    }
}

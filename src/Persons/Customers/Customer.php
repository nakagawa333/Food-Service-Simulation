<?php

namespace Persons\Customers;

use \Persons\Person;

class Customer extends Person
{
    private $tastesMap;

    public function __construct(string $name, string $age, string $address, $tastesMap)
    {
        parent::__construct($name, $age, $address);
        $this->tastesMap = $tastesMap;
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

        $categoriesMap = array_flip($categories);
        $interestedCategories = array_intersect_key($this->tastesMap, $categoriesMap);
        return $interestedCategories;
    }

    public function order($restaurant)
    {
        $interestedCategories = $this->interestedCategories($restaurant);
        //print_r($interestedCategories);
    }
}

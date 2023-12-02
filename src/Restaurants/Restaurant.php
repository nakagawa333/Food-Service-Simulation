<?php

namespace Restaurants;

use Exception;

class Restaurant
{
    private array $menu = [];
    private array $employees = [];

    public function __construct($foodItem, $employees)
    {
        $this->menu = $foodItem;
        $this->employees = $employees;
    }

    public function getMenu()
    {
        return $this->menu;
    }

    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     *
     * @param $categories カテゴリー一覧
     */
    public function order(array $categories)
    {
        $orders = array();

        $menu = $this->getMenu();

        $menuCategorys = array();
        foreach ($menu as $item) {
            $category = $item->getCategory();
            if (array_key_exists($category, $menuCategorys)) {
                $menuCategory = $menuCategorys[$category];
                array_push($category, $menuCategory);
                $menuCategorys[$category] = $menuCategory;
            } else {
                $menuCategorys[$category] = [$item];
            }
        }

        foreach ($categories as $category) {
            if (array_key_exists($category, $menuCategorys)) {
                $menuCategory = $menuCategorys[$category];
                foreach ($menuCategory as $menu) {
                    array_push($orders, $menu);
                }
            }
        }

        $foodOrder = new \FoodOrder\FoodOrder($orders, time());

        //レジ
        $cashier = $this->getCashier($this->employees);

        if ($cashier === null) {
            throw new Exception("レジの方が存在しません");
        }

        $invoice = $cashier->genrateInvoice($cashier);

        //シェフ
        $chef = $this->getChef($this->employees);

        if ($chef === null) {
            throw new Exception("シェフの方が存在しません");
        }

        return $orders;
    }

    /**
     * レジ係を取得する
     * @param $employees 雇用者リスト
     * @return レジ係
     */

    public function getCashier($employees)
    {
        foreach ($employees as $employ) {
            //クラス名
            $className = get_class($employ);

            //クラス名がレジ係
            if (strcmp($className, "Persons\Employees\ChefPersons\Employees\Cashier")) {
                return $employ;
            };
        }

        return null;
    }

    /**
     * シェフを取得する
     * @param $employees 雇用者リスト
     * @return シェフ
     */
    public function getChef($employees)
    {
        foreach ($employees as $employ) {
            $className = get_class($employ);
            //クラス名がシェフ係
            if (strcmp($className, "Persons\Employees\ChefPersons\Employees\Chef")) {
                return $employ;
            };
        }

        return null;
    }
}

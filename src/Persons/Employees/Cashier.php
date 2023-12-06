<?php

namespace Persons\Employees;

use \Invoice\Invoice;

class Cashier extends Employee
{
    private string $name;
    public function __construct(string $name, string $age, string $address, string $employeeId, int $salary)
    {
        $this->name = $name;
        parent::__construct($name, $age, $address, $employeeId, $salary);
    }

    /**
     * 請求書を作成する
     * @param $order オーダー
     */
    public function genrateInvoice($orders)
    {
        $finalPrice = 0;
        $orderTime = $orders->getOrderTime();
        $items = $orders->getItems();
        foreach ($items as $item) {
            $finalPrice += $item->getPrice();
        }

        printf("%s madethe invoice \n", $this->name);

        $invoice = new Invoice($finalPrice, $orderTime);
        return $invoice;
    }

    /**
     * オーダーを作成する
     * @param $categories カテゴリー 
     * @param $items メニュー
     * @return オーダー
     */
    public function generateOrder(array $categories, array $menu)
    {
        $menuMap = $this->createMenuMap($menu);
        $orders = array();

        foreach ($categories as $key => $value) {
            $subMenu = $menuMap[$key];
            //注文の数だけループ
            for ($i = 0; $i < $value; $i++) {
                array_push($orders, $subMenu);
            }
        }

        printf("%s received the order. \n", $this->name);
        $foodOrder = new \FoodOrder\FoodOrder($orders);
        return $foodOrder;
    }

    public function createMenuMap($menu)
    {
        $menuMap = array();
        foreach ($menu as $item) {
            $menuMap[$item->getCategory()] = $item;
        }
        return $menuMap;
    }
}

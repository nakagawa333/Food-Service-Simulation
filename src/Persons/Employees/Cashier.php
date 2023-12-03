<?php

namespace Persons\Employees;

use \Invoice\Invoice;

class Cashier extends Employee
{
    public function __construct()
    {
        parent::__construct("レジ", 20, "東京都", "test2", 9.25);
    }

    /**
     * 請求書を作成する
     * @param $order オーダー
     */
    public function genrateInvoice($orders)
    {
        $finalPrice = 0;
        $orderTime = $orders->getOrderTime();
        foreach ($orders as $order) {
            $finalPrice += $order->getPrice();
        }

        $invoice = new Invoice($finalPrice, $orderTime);
        return $invoice;
    }

    /**
     * オーダーを作成する
     * @param $categories カテゴリー 
     * @param $items メニュー
     * @return オーダー
     */
    public static function generateOrder(array $categories, array $menu)
    {
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
        $orders = array();
        foreach ($categories as $category) {
            if (array_key_exists($category, $menuCategorys)) {
                $menuCategory = $menuCategorys[$category];
                foreach ($menuCategory as $menu) {
                    array_push($orders, $menu);
                }
            }
        }
        $foodOrder = new \FoodOrder\FoodOrder($orders, time());
        return $foodOrder;
    }
}

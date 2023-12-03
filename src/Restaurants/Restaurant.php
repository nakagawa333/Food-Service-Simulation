<?php

namespace Restaurants;

use Exception;
use Persons\Employees\Cashier;
use Persons\Employees\Chef;

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
        $menu = $this->getMenu();

        //レジ
        $cashier = $this->getCashier($this->employees);

        if ($cashier === null) {
            throw new Exception("レジの方が存在しません");
        }
        //オーダー
        $orders = $cashier->generateOrder($categories, $menu);

        //請求書
        $invoice = $cashier->genrateInvoice($cashier);

        //シェフ
        $chef = $this->getChef($this->employees);

        if ($chef === null) {
            throw new Exception("シェフの方が存在しません");
        }

        return $invoice;
    }

    /**
     * レジ係を取得する
     * @param $employees 雇用者リスト
     * @return レジ係
     */

    private function getCashier($employees)
    {
        foreach ($employees as $employ) {
            if ($employ instanceof Cashier) {
                return $employ;
            }
        }

        return null;
    }

    /**
     * シェフを取得する
     * @param $employees 雇用者リスト
     * @return シェフ
     */
    private function getChef($employees)
    {
        foreach ($employees as $employ) {
            if ($employ instanceof Chef) {
                return $employ;
            }
        }
        return null;
    }
}

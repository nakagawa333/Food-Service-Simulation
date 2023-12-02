<?php

namespace Persons\Employees;

class Chef extends Employee
{
    public function __construct()
    {
        parent::__construct("チーフ", 25, "東京都", "test1", 5.25);
    }

    /**
     * 請求書を作成する
     * @param $order オーダー
     */
    public function genrateInvoice($order)
    {
    }
}

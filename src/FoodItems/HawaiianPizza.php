<?php

namespace FoodItems;

class HawaiianPizza extends FoodItem
{
    const CATEGORY = "ピザ";

    public function __construct()
    {
        parent::__construct("ハワイアンピザ", "he chef William cooked a Pizza", 100);
    }
}

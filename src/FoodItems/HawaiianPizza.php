<?php

namespace FoodItems;

class HawaiianPizza extends FoodItem
{
    const CATEGORY = "HawaiianPizza";

    public function __construct()
    {
        parent::__construct("ハワイアンピザ", "he chef William cooked a Pizza", 400);
    }
}

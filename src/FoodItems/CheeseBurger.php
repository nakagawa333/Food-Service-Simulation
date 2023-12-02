<?php

namespace FoodItems;

class CheeseBurger extends FoodItem
{
    const CATEGORY = "ハンバーガー";

    public function __construct()
    {
        parent::__construct("チーズバーガー", "he chef William cooked a CheeseBurger", 250);
    }
}

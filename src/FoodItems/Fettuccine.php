<?php

namespace FoodItems;

class Fettuccine extends FoodItem
{
    const CATEGORY = "パスタ";
    public function __construct()
    {
        parent::__construct("フェットゥチーネ", "he chef William cooked a Fettuccine", 300);
    }
}

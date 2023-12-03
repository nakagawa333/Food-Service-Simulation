<?php

namespace FoodItems;

class Spaghetti extends FoodItem
{
    const CATEGORY = "Spaghetti";
    public function __construct()
    {
        parent::__construct("スパゲッティ", "he chef William cooked a Spaghetti", 1000);
    }
}

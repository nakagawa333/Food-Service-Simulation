<?php

namespace FoodItems;

abstract class FoodItem
{
    //各商品アイテムの名称
    private string $name;
    //説明
    private string $description;
    //価格
    private int $price;

    public function __construct(string $name, string $description, string $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getName(): string
    {
        // $thisは常にクラス定義内で利用可能な自己参照変数です。
        return $this->name;
    }

    public function getdescription(): string
    {
        return $this->description;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

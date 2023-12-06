<?php

namespace Invoice;

//請求書
class Invoice
{
    public float $finalPrice;
    public $orderTime;
    public float $estimatedTimeInMinutes;

    public function __construct(float $finalPrice, $orderTime)
    {
        $this->finalPrice = $finalPrice;
        $this->orderTime = $orderTime;
        $this->estimatedTimeInMinutes = 0;
    }

    public function getFinalPrice(): float
    {
        return $this->finalPrice;
    }

    public function getOrderTime()
    {
        return $this->orderTime;
    }

    public function printInvoice()
    {
        $orderTime = $this->formattedDateTime($this->getOrderTime());
        $h = "-------------------------\n";
        printf("%sDate: %s\nFinal Price: $%s\n%s ", $h, $orderTime, number_format($this->getFinalPrice(), 2), $h);
    }

    public function formattedDateTime($time)
    {
        return date("Y/m/d h:i:s", $time);
    }
}

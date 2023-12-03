<?php

namespace Invoice;

//請求書
class Invoice
{
    public float $finalPrice;
    public $orderTime;
    public int $estimatedTimeInMinutes;

    public function __construct(int $finalPrice, mixed $orderTime)
    {
        $this->finalPrice;
        $this->orderTime;
        $this->estimatedTimeInMinutes = 0;
    }

    public function printInvoice()
    {
    }
}

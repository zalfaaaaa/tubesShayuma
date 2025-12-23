<?php

namespace App\Contracts;

interface OrderProcessInterface
{
    public function inputBerat(float $berat): void;
    public function bayar(): void;
}

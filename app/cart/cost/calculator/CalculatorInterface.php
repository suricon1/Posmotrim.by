<?php

namespace App\cart\cost\calculator;

use App\cart\CartItem;
use App\cart\cost\Cost;

interface CalculatorInterface
{
    /**
     * @param CartItem[] $items
     * @return Cost
     */
    public function  getCost(array $items): Cost;
} 
<?php

namespace LlewellynThomas\Coins\Currency;

interface CurrencyInterface
{
    public function countCoins($amount);

    public function getName();
}
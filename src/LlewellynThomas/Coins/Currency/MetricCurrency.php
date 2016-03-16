<?php

namespace LlewellynThomas\Coins\Currency;

/**
 * Class MetricCurrency
 * @package LlewellynThomas\Coins\Currency
 */
class MetricCurrency implements CurrencyInterface
{
    /**
     * @var array
     */
    private $coins = [];

    /**
     * @var string
     */
    private $name;

    /**
     * MetricCurrency constructor.
     * @param string $name
     * @param array $coins
     */
    public function __construct($name, array $coins)
    {
        $this->name = $name;
        $this->coins = $coins;
    }

    /**
     * @param $amount
     * @return array
     */
    public function countCoins($amount)
    {
        $collection = [];
        \array_walk($this->coins, function($coin) use (&$amount, &$collection) {
               $collection[$coin] = (int)\floor($amount/$coin);
                $amount = $amount % $coin;
        });

        return \array_filter($collection);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
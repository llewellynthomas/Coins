<?php

namespace LlewellynThomas\Coins\Counter;

use LlewellynThomas\Coins\Currency\CurrencyInterface;

/**
 * Class CoinCounter
 * @package LlewellynThomas\Coins\Counter
 */
class CoinCounter
{
    /**
     * @var array
     */
    private $currencies;

    /**
     * @var CurrencyInterface
     */
    private $currency;

    /**
     * @param CurrencyInterface $currency
     */
    public function addCurrency(CurrencyInterface $currency)
    {
        if (empty($this->currencies[$currency->getName()])) {
            $this->currencies[$currency->getName()] = $currency;
        }
    }

    /**
     * @param $currencyName
     * @param $amount
     * @return array
     */
    public function calculateCoins($currencyName, $amount)
    {
        $this->setCurrency($currencyName);
        
        return $this->currency->countCoins($amount);
    }

    /**
     * @param $currency
     */
    private function setCurrency($currency)
    {
        if (empty($this->currencies[$currency])) {
            throw new \RuntimeException("Currency not supported: " . $currency);
        }

        $this->currency = $this->currencies[$currency];
    }
}
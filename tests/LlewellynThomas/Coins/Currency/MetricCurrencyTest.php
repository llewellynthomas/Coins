<?php

namespace LlewellynThomas\Coins\Currency;

/**
 * Class CurrencyTest
 * @package LlewellynThomas\Coins\Currency
 */
class MetricCurrencyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MetricCurrency
     */
    private $object;

    public function setUp()
    {
        $this->object = new MetricCurrency('pound', [200, 100, 50, 20, 10, 5, 2, 1]);
    }

    public function testGetName()
    {
        $this->assertEquals('pound', $this->object->getName());
    }

    /**
     * @dataProvider countProvider
     */
    public function testCount($expected, $amount)
    {
        $this->assertEquals($expected, $this->object->countCoins($amount));
    }

    public function countProvider()
    {
        return [
            [
                [
                    200 => 1
                ],
                200
            ],
            [
                [
                    200 => 28,
                    50 => 1,
                    20 => 2
                ],
                5690
            ],
            [
                [],
                0
            ]
        ];
    }
}

<?php

namespace LlewellynThomas\Coins\Counter;

/**
 * Class CoinCounterTest
 * @package LlewellynThomas\Coins\Counter
 */
class CoinCounterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CoinCounter
     */
    private $object;

    public function setUp()
    {
        $this->object = new CoinCounter();
    }

    public function testCountCalculator()
    {
        $expected = [200 => 1];
        $amount = 200;
        $this->object->addCurrency($this->getMockCurrency('pound', $expected, $amount));

        $this->assertEquals($expected, $this->object->calculateCoins('pound', $amount));
        
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Currency not supported: dollar
     */
    public function testCountCoinUnexpectedCurrency()
    {
        $this->object->calculateCoins('dollar',1234);
    }

    private function getMockCurrency($name, $countedCoins, $with)
    {
        $mock = $this->getMockBuilder('LlewellynThomas\Coins\Currency\MetricCurrency')
            ->disableOriginalConstructor()
            ->setMethods(['countCoins', 'getName'])
            ->getMock();
        $mock->expects($this->exactly(2))->method('getName')->will($this->returnValue($name));
        $mock->expects($this->once())->method('countCoins')->with($this->equalTo($with))->will($this->returnValue($countedCoins));

        return $mock;
    }
}

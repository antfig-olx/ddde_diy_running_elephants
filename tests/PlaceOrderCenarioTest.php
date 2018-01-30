<?php

namespace Diy;

use Diy\Domain\Commands\PlaceOrder;
use Diy\Domain\Events\CustomerPlacedOrder;
use Diy\Domain\Events\CustomerStartedShopping;
use Diy\Domain\Events\ProductWasAddedToCart;
use Diy\Tools\TestScenario;
use PHPUnit\Framework\TestCase;

class PlaceOrderCenarioTest extends TestCase
{
    /**
     * @var TestScenario
     */
    public $scenario;

    public function setUp()
    {
        $this->scenario = new TestScenario();
    }

    public function testPlacedOrder()
    {
        $customerId = '1';
        $cartId     = '2222';
        $orderTime  = '2018-01-01 03:03:03';
        $sku        = "0000-aaaa-bbb";
        $price      = "13,00";
        $addedAt    = "2018-01-01 02:03:03";

        $products = [];

        $this->scenario
            ->given(new CustomerStartedShopping($customerId, $cartId))
            ->given(new ProductWasAddedToCart($customerId, $cartId, $sku, $price, $addedAt))
            ->when(new PlaceOrder($customerId, $cartId, $orderTime))
            ->then(new CustomerPlacedOrder($customerId, $cartId, $products))
            ->assert();
    }
}

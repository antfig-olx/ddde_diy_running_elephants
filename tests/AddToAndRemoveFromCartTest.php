<?php declare(strict_types=1);

namespace Diy;

use Diy\Domain\Commands\AddProductToCart;
use Diy\Domain\Commands\RemovePorductFromCart;
use Diy\Domain\Events\CustomerStartedShopping;
use Diy\Domain\Events\ProductWasAddedToCart;
use Diy\Domain\Events\ProductWasRemovedFromCart;
use Diy\Tools\TestScenario;

class AddToAndRemoveFromCartTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var TestScenario
     */
    public $scenario;

    private $cartId;
    private $customerId;
    private $sku;
    private $price;
    private $addedAt;
    private $removedAt;

    public function setUp()
    {
        $this->scenario = new TestScenario();

        $this->cartId = '2';
        $this->customerId = '1';
        $this->sku = '23';
        $this->price = '2,34';
        $this->addedAt = '2017-10-12 12:24:22';
        $this->removedAt = '2017-10-12 12:26:22';
    }

    public function testHappyPath()
    {
        $this->scenario
            ->given(
                new CustomerStartedShopping($this->customerId, $this->cartId)
            )
            ->when(
                new AddProductToCart($this->customerId, $this->cartId, $this->sku, $this->price, $this->addedAt)
            )
            ->then(
                new ProductWasAddedToCart($this->customerId, $this->cartId, $this->sku, $this->price, $this->addedAt)
            )
            ->assert();
    }

    public function testNoCartWasStarted()
    {
        $this->scenario
            ->when(
                new AddProductToCart($this->customerId, $this->cartId, $this->sku, $this->price, $this->addedAt)
            )
            ->thenNothing()
            ->assert();
    }

    public function testRemoveExistingProduct()
    {
        $this->scenario
            ->given(
                new CustomerStartedShopping($this->customerId, $this->cartId)
            )
            ->given(
                new ProductWasAddedToCart($this->customerId, $this->cartId, $this->sku, $this->price, $this->addedAt)
            )
            ->when(
                new RemovePorductFromCart($this->customerId, $this->cartId, $this->sku, $this->price, $this->removedAt)
            )
            ->then(
                new ProductWasRemovedFromCart($this->customerId, $this->cartId, $this->sku, $this->price, $this->removedAt)
            )
            ->assert();
    }
}

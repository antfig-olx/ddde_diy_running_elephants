<?php declare(strict_types=1);

namespace Diy;

use Diy\Domain\Commands\AddProductToCart;
use Diy\Domain\Commands\PlaceOrder;
use Diy\Domain\Commands\RemovePorductFromCart;
use Diy\Domain\Commands\StartShopping;
use Diy\Domain\Events\CustomerPlacedOrder;
use Diy\Domain\Events\CustomerStartedShopping;
use Diy\Domain\Events\ProductWasAddedToCart;
use Diy\Domain\Events\ProductWasRemovedFromCart;
use Diy\Tools\EventStore;
use PHPUnit\Framework\TestCase;

class EventStoreTest extends TestCase
{
    /**
     * @var TestScenario
     */
    public $scenario;

    private static function getDate()
    {
        return date('Y-m-d H:i:s');
    }

    public static function initializeWithDefaults()
    {
        $eventStore = new EventStore();

        $customer1Id = '1';
        $customer1CartId = '10';
        $command = new StartShopping($customer1Id, $customer1CartId, self::getDate());
        $eventStore->add(
            new CustomerStartedShopping($customer1Id, $customer1CartId),
            [
                'causationId' => $command->uuid,
                'command' => $command,
            ]
        );


        $customer2Id = '2';
        $customer2CartId = '11';

        $command = new StartShopping($customer2Id, $customer2CartId, self::getDate());
        $eventStore->add(
            new CustomerStartedShopping($customer2Id, $customer2CartId),
            [
                'causationId' => $command->uuid,
                'command' => $command,
            ]
        );

        $command = new AddProductToCart($customer2Id, $customer2CartId, 'sku1', '3.23', self::getDate());
        $eventStore->add(
            new ProductWasAddedToCart(
                $customer2Id, $customer2CartId, 'sku1', '3.23', date('Y-m-d H:i:s')
            ),
            [
                'causationId' => $command->uuid,
                'command' => $command,
            ]
        );

        $command = new AddProductToCart($customer2Id, $customer2CartId, 'sku2', '4.23', self::getDate());
        $eventStore->add(
            new ProductWasAddedToCart(
                $customer2Id, $customer2CartId, 'sku2', '4.23', date('Y-m-d H:i:s')
            ),
            [
                'causationId' => $command->uuid,
                'command' => $command,
            ]
        );

        $command = new RemovePorductFromCart($customer2Id, $customer2CartId, 'sku2', '4.23', self::getDate());
        $eventStore->add(
            new ProductWasRemovedFromCart(
                $customer2Id, $customer2CartId, 'sku2', '4.23', date('Y-m-d H:i:s')
            ),
            [
                'causationId' => $command->uuid,
                'command' => $command,
            ]
        );

        $command = new AddProductToCart($customer2Id, $customer2CartId, 'sku2', '4.23', self::getDate());
        $eventStore->add(
            new ProductWasAddedToCart(
                $customer2Id, $customer2CartId, 'sku2', '4.23', date('Y-m-d H:i:s')
            ),
            [
                'causationId' => $command->uuid,
                'command' => $command,
            ]
        );

        $customer3Id = 3;
        $customer3CartId = 12;

        $command = new StartShopping($customer3Id, $customer3CartId, self::getDate());
        $eventStore->add(
            new CustomerStartedShopping($customer3Id, $customer3CartId),
            [
                'causationId' => $command->uuid,
                'command' => $command,
            ]
        );

        $command = new AddProductToCart($customer3Id, $customer3CartId, 3.23, self::getDate());
        $eventStore->add(
            new ProductWasAddedToCart(
                $customer3Id, $customer3CartId, 'sku1', '3.23', date('Y-m-d H:i:s')
            ),
            [
                'causationId' => $command->uuid,
                'command' => $command,
            ]
        );

        $command = new PlaceOrder($customer3Id, $customer3CartId, self::getDate());
        $eventStore->add(
            new CustomerPlacedOrder($customer3Id, $customer3CartId, []),
            [
                'causationId' => $command->uuid,
                'command' => $command,
            ]
        );

        return $eventStore;
    }

    public function testEventStore()
    {
        $eventStore = self::initializeWithDefaults();
        $eventsOfCart = $eventStore->fetchEventsOfCart(11);
        $this->assertEquals(
            5,
            count($eventsOfCart),
            'Number of events for cart is not correct'
        );
        print_r($eventsOfCart);

    }
}

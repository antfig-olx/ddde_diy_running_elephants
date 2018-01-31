<?php declare(strict_types=1);

namespace Diy;

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

    public static function initializeWithDefaults()
    {
        $eventStore = new EventStore();

        $customer1Id = '1';
        $customer1CartId = '10';
        $eventStore->add(
            new CustomerStartedShopping($customer1Id, $customer1CartId),
            []
        );


        $customer2Id = '2';
        $customer2CartId = '11';
        $eventStore->add(
            new CustomerStartedShopping($customer2Id, $customer2CartId),
            []
        );
        $eventStore->add(
            new ProductWasAddedToCart(
                $customer2Id, $customer2CartId, 'sku1', '3.23', date('Y-m-d H:i:s')
            ),
            []
        );
        $eventStore->add(
            new ProductWasAddedToCart(
                $customer2Id, $customer2CartId, 'sku2', '4.23', date('Y-m-d H:i:s')
            ),
            []
        );

        $eventStore->add(
            new ProductWasRemovedFromCart(
                $customer2Id, $customer2CartId, 'sku2', '4.23', date('Y-m-d H:i:s')
            ),
            []
        );

        $eventStore->add(
            new ProductWasAddedToCart(
                $customer2Id, $customer2CartId, 'sku2', '4.23', date('Y-m-d H:i:s')
            ),
            []
        );

        $customer3Id = 3;
        $customer3CartId = 12;
        $eventStore->add(
            new CustomerStartedShopping($customer3Id, $customer3CartId),
            []
        );
        $eventStore->add(
            new ProductWasAddedToCart(
                $customer3Id, $customer3CartId, 'sku1', '3.23', date('Y-m-d H:i:s')
            ),
            []
        );
        $eventStore->add(
            new CustomerPlacedOrder($customer3Id, $customer3CartId, []),
            []
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

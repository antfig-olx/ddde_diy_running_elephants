<?php declare(strict_types=1);

namespace Diy;

use Diy\Tools\TestScenario;
use PHPUnit\Framework\TestCase;

class StartShoppingTest extends TestCase
{
    /**
     * @var TestScenario
     */
    public $scenario;

    public function setUp()
    {
        $this->scenario = new TestScenario();
    }

    public function testStartShopping()
    {
        $customerId = 2;
        $cartId = '1';
        $startTime = '2018-01-01 03:14:45';


        $this->scenario
            ->when(
                new Domain\Commands\StartShopping($customerId, $cartId, $startTime)
            )
            ->then(
                new Domain\Events\CustomerStartedShopping($customerId, $cartId)
            )
            ->assert();
    }
}

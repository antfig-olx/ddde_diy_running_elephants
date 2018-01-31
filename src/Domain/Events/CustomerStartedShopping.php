<?php
namespace Diy\Domain\Events;

class CustomerStartedShopping implements \Diy\Domain\Interfaces\EventInterface {

    public $uuid;
    private $customerId;
    private $cartId;

    public function __construct($customerId, $cartId)
    {
        $this->uuid = rand(1, 100000);
        $this->customerId = $customerId;
        $this->cartId = $cartId;
    }

    public function getcustomerId()
    {
         return $this->customerId;
    }

    public function getcartId()
    {
         return $this->cartId;
    }

}

<?php
namespace Diy\Domain\Events;

class CustomerStartedShopping implements \Diy\Domain\Interfaces\EventInterface {

    private $customerId;
    private $cartId;

    public function __construct($customerId, $cartId)
    {
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

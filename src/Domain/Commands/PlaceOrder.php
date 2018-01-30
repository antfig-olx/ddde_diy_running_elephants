<?php
namespace Diy\Domain\Commands;

class PlaceOrder implements \Diy\Domain\Interfaces\CommandInterface {

    private $customerId;
    private $cartId;
    private $orderTime;

    public function __construct($customerId, $cartId, $orderTime)
    {
        $this->customerId = $customerId;
        $this->cartId = $cartId;
        $this->orderTime = $orderTime;
    }

    public function getcustomerId()
    {
         return $this->customerId;
    }

    public function getcartId()
    {
         return $this->cartId;
    }

    public function getorderTime()
    {
         return $this->orderTime;
    }

}

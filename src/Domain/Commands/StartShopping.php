<?php
namespace Diy\Domain\Commands;

class StartShopping implements \Diy\Domain\Interfaces\CommandInterface {

    public $uuid;
    private $customerId;
    private $cartId;
    private $startTime;

    public function __construct($customerId, $cartId, $startTime)
    {
        $this->uuid = rand(1, 100000);
        $this->customerId = $customerId;
        $this->cartId = $cartId;
        $this->startTime = $startTime;
    }

    public function getcustomerId()
    {
         return $this->customerId;
    }

    public function getcartId()
    {
         return $this->cartId;
    }

    public function getstartTime()
    {
         return $this->startTime;
    }

}

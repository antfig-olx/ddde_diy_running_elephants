<?php
namespace Diy\Domain\Events;

class CustomerPlacedOrder implements \Diy\Domain\Interfaces\EventInterface {

    public $uuid;
    private $customerId;
    private $cartId;
    private $products;

    public function __construct($customerId, $cartId, $products)
    {
        $this->uuid = rand(1, 100000);
        $this->customerId = $customerId;
        $this->cartId = $cartId;
        $this->products = $products;
    }

    public function getcustomerId()
    {
         return $this->customerId;
    }

    public function getcartId()
    {
         return $this->cartId;
    }

    public function getproducts()
    {
         return $this->products;
    }

}

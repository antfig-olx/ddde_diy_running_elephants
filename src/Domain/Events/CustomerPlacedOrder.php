<?php
namespace Diy\Domain\Events;

class CustomerPlacedOrder implements \Diy\Domain\Interfaces\EventInterface {

    private $customerId;
    private $cartId;
    private $products;

    public function __construct($customerId, $cartId, $products)
    {
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

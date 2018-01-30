<?php
namespace Diy\Domain\Events;

class ProductWasRemovedFromCart implements \Diy\Domain\Interfaces\EventInterface {

    private $customerId;
    private $cartId;
    private $sku;
    private $price;
    private $removedAt;

    public function __construct($customerId, $cartId, $sku, $price, $removedAt)
    {
        $this->customerId = $customerId;
        $this->cartId = $cartId;
        $this->sku = $sku;
        $this->price = $price;
        $this->removedAt = $removedAt;
    }

    public function getcustomerId()
    {
         return $this->customerId;
    }

    public function getcartId()
    {
         return $this->cartId;
    }

    public function getsku()
    {
         return $this->sku;
    }

    public function getprice()
    {
         return $this->price;
    }

    public function getremovedAt()
    {
         return $this->removedAt;
    }

}

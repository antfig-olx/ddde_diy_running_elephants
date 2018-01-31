<?php
namespace Diy\Domain\Commands;

class RemovePorductFromCart implements \Diy\Domain\Interfaces\CommandInterface {

    public $uuid;
    private $customerId;
    private $cartId;
    private $sku;
    private $price;
    private $removedAt;

    public function __construct($customerId, $cartId, $sku, $price, $removedAt)
    {
        $this->uuid = rand(1, 100000);
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

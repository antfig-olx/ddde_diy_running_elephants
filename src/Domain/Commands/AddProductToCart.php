<?php
namespace Diy\Domain\Commands;

class AddProductToCart implements \Diy\Domain\Interfaces\CommandInterface {

    public $uuid;
    private $customerId;
    private $cartId;
    private $sku;
    private $price;
    private $addedAt;

    public function __construct($customerId, $cartId, $sku, $price, $addedAt)
    {
        $this->uuid = rand(1, 100000);
        $this->customerId = $customerId;
        $this->cartId = $cartId;
        $this->sku = $sku;
        $this->price = $price;
        $this->addedAt = $addedAt;
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

    public function getaddedAt()
    {
         return $this->addedAt;
    }

}

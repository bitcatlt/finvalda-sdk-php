<?php

namespace Finvalda\Method\Models;

class Product
{
    /** @var float */
    protected $price = 0.0;

    /** @var string */
    protected $code;

    /** @var string */
    protected $name;

    /** @var int */
    protected $quantity = 0;

    /** @var int */
    protected $quantityWithReserve = 0;

    /** @var string */
    protected $mainCategory;

    /** @var string */
    protected $category;

    public function setPrice(float $price):void
    {
        $this->price = $price;
    }

    public function getPrice():float
    {
        return $this->price;
    }

    public function setName(string $name):void
    {
        $this->name = $name;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function setCode(string $code):void
    {
        $this->code = $code;
    }

    public function getCode():string
    {
        return $this->code;
    }

    public function setQuantity(int $quantity):void
    {
        $this->quantity = $quantity;
    }

    public function getQuantity():int
    {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getQuantityWithReserve():int
    {
        return $this->quantityWithReserve;
    }

    /**
     * @param int $quantityWithReserve
     */
    public function setQuantityWithReserve(int $quantityWithReserve):void
    {
        $this->quantityWithReserve = $quantityWithReserve;
    }

    /**
     * @return string
     */
    public function getMainCategory():string
    {
        return $this->mainCategory;
    }

    /**
     * @param string $mainCategory
     */
    public function setMainCategory(string $mainCategory):void
    {
        $this->mainCategory = $mainCategory;
    }

    /**
     * @return string
     */
    public function getCategory():string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category):void
    {
        $this->category = $category;
    }
}

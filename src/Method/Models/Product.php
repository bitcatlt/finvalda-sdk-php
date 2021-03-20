<?php

namespace Finvalda\Method\Models;

class Product
{
    /** @var bool */
    protected $isAvailable;

    /** @var float */
    protected $price = 0.0;

    /** @var string */
    protected $code;

    /** @var string */
    protected $name;

    /** @var int  */
    protected $quantity = 0;

    /** @var int */
    protected $reservedQuantity = 0;

    public function __construct()
    {
        $this->setIsAvailable(false);
    }

    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable)
    {
        $this->isAvailable = $isAvailable;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getPrice():float
    {
        return $this->price;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getCode():string
    {
        return $this->code;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getQuantity():int
    {
        return $this->quantity;
    }

    public function setReservedQuantity(int $reservedQuantity): void
    {
        $this->reservedQuantity = $reservedQuantity;
    }

    public function getReservedQuantity():int
    {
        return $this->reservedQuantity;
    }
}

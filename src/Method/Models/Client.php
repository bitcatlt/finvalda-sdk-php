<?php

namespace Finvalda\Method\Models;

class Client
{
    /** @var bool */
    protected $isClientExist;

    /** @var string */
    protected $fvsUserCode;

    /** @var string */
    protected $name;

    /** @var string */
    protected $address;

    /** @var string */
    protected $phone;

    /** @var string */
    protected $companyCode;

    /** @var string */
    protected $vatCode;

    public function __construct()
    {
        $this->setIsClientExist(false);
    }

    /**
     * @return string
     */
    public function getFvsUserCode():string
    {
        return $this->fvsUserCode;
    }

    /**
     * @param string $fvsUserCode
     */
    public function setFvsUserCode(string $fvsUserCode):void
    {
        $this->fvsUserCode = $fvsUserCode;
    }

    /**
     * @return string
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name):void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress():string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address):void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getPhone():string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone):void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getCompanyCode():string
    {
        return $this->companyCode;
    }

    /**
     * @param string $companyCode
     */
    public function setCompanyCode(string $companyCode):void
    {
        $this->companyCode = $companyCode;
    }

    /**
     * @return string
     */
    public function getVatCode():string
    {
        return $this->vatCode;
    }

    /**
     * @param string $vatCode
     */
    public function setVatCode(string $vatCode):void
    {
        $this->vatCode = $vatCode;
    }

    public function isClientExist():bool
    {
        return $this->isClientExist;
    }

    public function setIsClientExist(bool $isClientExist)
    {
        $this->isClientExist = $isClientExist;
    }

}

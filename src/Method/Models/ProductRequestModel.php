<?php

namespace Finvalda\Method\Models;

use Finvalda\Http\RequestInterface;

class ProductRequestModel
{
    /** @var string */
    protected $productCode;

    /** @var string */
    protected $serviceCode;

    /** @var string */
    protected $requestType = RequestInterface::TYPE_PRODUCT;

    /** @var string */
    private $warehouse;

    /** @var FinvaldaConfig */
    protected $finvaldaConfig;

    /** @var string */
    protected $functionName;

    public function getProductCode():?string
    {
        return $this->productCode;
    }

    public function setProductCode($productCode):void
    {
        $this->productCode = $productCode;
    }

    public function getRequestType():string
    {
        return $this->requestType;
    }

    public function setRequestType(string $requestType):void
    {
        $this->requestType = $requestType;
    }

    public function setFinvaldaConfig(FinvaldaConfig $finvaldaConfig)
    {
        $this->finvaldaConfig = $finvaldaConfig;
    }

    public function getFinvaldaConfig(): FinvaldaConfig
    {
        return $this->finvaldaConfig;
    }

    public function getWarehouse():string
    {
        return $this->warehouse;
    }

    public function setWarehouse(string $warehouse):void
    {
        $this->warehouse = $warehouse;
    }

    public function getFunctionName():string
    {
        return $this->functionName;
    }

    public function setFunctionName(string $functionName):void
    {
        $this->functionName = $functionName;
    }

    public function getServiceCode():?string
    {
        return $this->serviceCode;
    }

    public function setServiceCode(string $serviceCode):void
    {
        $this->serviceCode = $serviceCode;
    }

}

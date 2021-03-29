<?php

namespace Finvalda\Method\Models;

use Finvalda\Http\RequestInterface;

class ProductRequestModel
{
    /** @var  string */
    protected $productCode;

    /** @var string */
    protected $requestType = RequestInterface::TYPE_PRODUCT;

    /** @var string */
    private $warehouse;

    /** @var FinvaldaConfig */
    protected $finvaldaConfig;

    public function getProductCode():?string
    {
        return $this->productCode;
    }

    public function setProductCode($productCode):void
    {
        $this->productCode = $productCode;
    }

    public function getProductRequestType():string
    {
        return $this->requestType;
    }

    public function setProductRequestType(string $productRequestType):void
    {
        $this->productRequestType = $productRequestType;
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
}

<?php

namespace Finvalda\Method\Models;

use Finvalda\Http\RequestInterface;

class ProductRequestModel
{
    /** @var  string */
    protected $productCode;

    /** @var string */
    protected $requestType = RequestInterface::TYPE_PRODUCT;

    /** @var Product */
    protected $product;

    /** @var Config */
    protected $config;

    public function getProduct():Product
    {
        return $this->product;
    }

    public function setProduct(Product $product)
    {
        $this->product = $product;
    }

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

    public function setConfig(Config $config)
    {
        $this->config = $config;
    }

    public function getConfig(): Config
    {
        return $this->config;
    }
}

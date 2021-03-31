<?php

namespace Finvalda\Method\Product;

use Finvalda\Http\SoapRequestInterface;
use Finvalda\Method\Models\ProductRequestModel;
use Finvalda\Method\RequestTrait;

class ProductRequest implements SoapRequestInterface
{
    use RequestTrait;

    public function __construct(ProductRequestModel $productRequestModel)
    {
        $this->productRequestModel = $productRequestModel;
    }

    public function getFunction():string
    {
        return $this->getProductRequestModel()->getFunctionName();
    }

    public function getType():string
    {
        return $this->getProductRequestModel()->getProductRequestType();
    }

    public function getParameters():array
    {
        $params = new \stdClass();

        if (null !== $this->getProductRequestModel()->getProductCode()) {
            $params->sPrekesKodas = $this->getProductRequestModel()->getProductCode();
        }

        if (null !== $this->getProductRequestModel()->getWarehouse()) {
            $params->sSandelioKodas = $this->getProductRequestModel()->getWarehouse();
        }

        $params->writeSchema  = false;

        return [$params];
    }
}

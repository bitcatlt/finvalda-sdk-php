<?php

namespace Finvalda\Method\Product;

use Finvalda\Http\RequestInterface;
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
        return 'GetEinamiejiLikuciaiXml';
    }

    public function getType():string
    {
        return RequestInterface::TYPE_PRODUCT;
    }

    public function getParameters():array
    {
        $params = new \stdClass();

        if (null !== $this->productRequestModel->getProductCode()) {
            $params->sPrekesKodas = $this->productRequestModel->getProductCode();
        }

        $params->writeSchema  = false;

        return [$params];
    }
}

<?php

namespace Finvalda\Http;

use Finvalda\Method\Models\ProductRequestModel;

trait ProductRequestTrait
{
    /** @var ProductRequestModel */
    protected $productRequestModel;

    protected function getProductRequestModel():ProductRequestModel
    {
        if (null === $this->productRequestModel) {
            $productRequest = new ProductRequestModel();
            $productRequest->setProductCode($this->getParam('productCode'));
            $productRequest->setRequest($this->request);

            $this->productRequestModel = $productRequest;
        }

        return $this->productRequestModel;
    }

    /**
     * @return mixed
     */
    protected function getParam(string $name, $defaultValue = null)
    {
        $params = array_merge($this->request->post, $this->request->get);
        $param = $defaultValue;

        if (isset($params[$name]) && null !== $params[$name]) {
            $param = $params[$name];
        }

        return $param;
    }
}

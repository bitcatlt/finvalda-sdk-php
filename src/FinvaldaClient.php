<?php

namespace Finvalda;

use Finvalda\Http\ClientInterface;
use Finvalda\Http\SoapClient;
use Finvalda\Method\Models\ProductRequestModel;
use Finvalda\Method\Product\ProductRequest;
use Finvalda\Method\Product\ProductResponseParser;
use Psr\Log\LoggerAwareTrait;

class FinvaldaClient implements ClientInterface
{
    use LoggerAwareTrait;

    protected function getClient():SoapClient
    {
        $client = new SoapClient();
        $client->setLogger($this->logger);

        return $client;
    }

    public function sendProductRequest(ProductRequestModel $productRequestModel)
    {
        $productRequest = new ProductRequest($productRequestModel);
        $response = $this->getClient()->send($productRequest);
        $productListResponseParser = new ProductResponseParser();
        $productsList = $productListResponseParser->extractProducts($response);

        return $productsList;
    }
}

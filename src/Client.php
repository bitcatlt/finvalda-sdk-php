<?php

namespace Finvalda;

use Finvalda\Http\ClientInterface;
use Finvalda\Http\SoapClient;
use Finvalda\Method\Models\ProductRequestModel;
use Finvalda\Method\ProductRequest;
use Psr\Log\LoggerAwareTrait;

class Client implements ClientInterface
{
    use LoggerAwareTrait;

    protected function getClient():SoapClient
    {
        $client = new SoapClient();
        $client->setLogger($this->logger);

        return $client;
    }

    public function getProductsList(ProductRequestModel $productRequestModel)
    {
        $productRequest = new ProductRequest($productRequestModel);
        $response = $this->getClient()->send($productRequest);
        $productListResponseParser = new ProductResponseParser();
        $productsList = $productListResponseParser->extractProducts($response);


        return $productsList;
    }

    public function getProductQuantity(ProductRequestModel $productRequestModel)
    {
        $productRequest = new ProductRequest($productRequestModel);
        $response = $this->getClient()->send($productRequest);

        return true;
    }
}

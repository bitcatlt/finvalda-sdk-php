<?php

namespace Finvalda;

use Finvalda\Http\ClientInterface;
use Finvalda\Http\Guzzle\SoapClient;
use Finvalda\Method\Insert\InsertRequest;
use Finvalda\Method\Insert\InsertResponseParser;
use Finvalda\Method\Models\InsertRequestModel;
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

    public function sendProductRequest(ProductRequestModel $productRequestModel): array
    {
        $productRequest = new ProductRequest($productRequestModel);
        $response = $this->getClient()->send($productRequest);
        $productListResponseParser = new ProductResponseParser();

        return $productListResponseParser->extractProducts($response);
    }

    public function sendInsertRequest(InsertRequestModel $insertRequestModel)
    {
        $insertNewItemRequest = new InsertRequest($insertRequestModel);
        $response = $this->getClient()->send($insertNewItemRequest);
        $responseParser = new InsertResponseParser();

        return $responseParser->extractResponse($response);
    }
}

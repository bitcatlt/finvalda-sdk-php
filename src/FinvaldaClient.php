<?php

namespace Finvalda;

use Finvalda\Http\ClientInterface;
use Finvalda\Http\Guzzle\SoapClient;
use Finvalda\Method\Client\ClientRequest;
use Finvalda\Method\Client\ClientResponseParser;
use Finvalda\Method\Insert\InsertRequest;
use Finvalda\Method\Insert\InsertResponseParser;
use Finvalda\Method\Models\Client;
use Finvalda\Method\Models\ClientRequestModel;
use Finvalda\Method\Models\InsertRequestModel;
use Finvalda\Method\Models\ProductRequestModel;
use Finvalda\Method\Product\ProductCheckResponseParser;
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

    public function productCheckRequest(ProductRequestModel $productRequestModel): bool
    {
        $productRequest = new ProductRequest($productRequestModel);
        $response = $this->getClient()->send($productRequest);
        $parser = new ProductCheckResponseParser();

        return $parser->parseResponse($response);
    }

    public function getClientRequest(ClientRequestModel $clientRequestModel): Client
    {
        $clientRequest = new ClientRequest($clientRequestModel);
        $response = $this->getClient()->send($clientRequest);
        $responseParser = new ClientResponseParser();

        return $responseParser->parseResponse($response);
    }

    public function sendInsertRequest(InsertRequestModel $insertRequestModel):bool
    {
        $insertNewItemRequest = new InsertRequest($insertRequestModel);
        $response = $this->getClient()->send($insertNewItemRequest);
        $responseParser = new InsertResponseParser();

        return $responseParser->parseResponse($response);
    }
}

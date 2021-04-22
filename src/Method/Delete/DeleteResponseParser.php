<?php

namespace Finvalda\Method\Delete;

use Finvalda\Http\ResponseParserInterface;
use Finvalda\Http\ResponseInterface;

class DeleteResponseParser implements ResponseParserInterface
{
    public function parseResponse(ResponseInterface $providerResponse):bool
    {
        $result = false;

        $response = $providerResponse->getResponseObject();
        if (
            (property_exists($response, 'InsertNewItemResult') && $response->InsertNewItemResult === 'Success')
            || (property_exists($response, 'InsertNewOperationResult') && $response->InsertNewOperationResult === 'Success')
        ){
            $result = true;
        }

        return $result;
    }
}

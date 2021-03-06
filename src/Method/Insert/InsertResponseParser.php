<?php

namespace Finvalda\Method\Insert;

use Finvalda\Http\ResponseParserInterface;
use Finvalda\Http\ResponseInterface;

class InsertResponseParser implements ResponseParserInterface
{
    public function parseResponse(ResponseInterface $providerResponse):array
    {
        $result = [
            'status' => false
        ];

        $response = $providerResponse->getResponseObject();
        if (
            (property_exists($response, 'InsertNewItemResult') && $response->InsertNewItemResult === 'Success')
            || (property_exists($response, 'InsertNewOperationResult') && $response->InsertNewOperationResult === 'Success')
        ) {
            $result = [
                'status' => true,
                'response' => property_exists($response, 'sError') ? $response->sError : ''
            ];
        }

        return $result;
    }
}

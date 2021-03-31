<?php

namespace Finvalda\Method\Product;

use Finvalda\Http\ResponseInterface;
use Finvalda\Http\ResponseParserInterface;

class ProductCheckResponseParser implements ResponseParserInterface
{

    public function parseResponse(ResponseInterface $providerResponse): bool
    {
        $productExist = false;

        $response = $providerResponse->getResponseObject();
        if (!empty($response->Xml)){
            $productExist = true;
        }

        return $productExist;
    }
}

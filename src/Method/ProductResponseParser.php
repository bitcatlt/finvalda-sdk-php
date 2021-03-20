<?php

namespace Finvalda;

use Finvalda\Http\ResponseInterface;

class ProductResponseParser
{
    use ResponseTrait;

    public function extractProducts(ResponseInterface $providerResponse): array
    {
        $parsedProductList = [];
        $result = $this->getFinvaldaResponseXML($providerResponse);

        if (!$providerResponse->hasErrors()) {
            foreach ($result->Eil ?? [] as $item) {
                $product = new Product();
                $product->setCode((string)$item->preke);
                $product->setName((string)$item->prekes_pav);
                $product->setQuantity((int)$item->kiekis);
                $product->setPrice((float)$item->savikaina);

                if ($item->kiekis > 0) {
                    $product->setIsAvailable(true);
                }

                $parsedProductList[] = $product;
            }
        } else {

        }


        return $parsedProductList;
    }
}

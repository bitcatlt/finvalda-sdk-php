<?php

namespace Finvalda\Method\Product;

use Finvalda\Http\ResponseInterface;
use Finvalda\Method\Models\Product;
use Finvalda\Method\ResponseTrait;

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
                $product->setWarehouseCode((string)$item->sandelis);
                $product->setCategory((string)$item->sandelio_pav);
                $product->setQuantity((int)$item->kiekis);
                $product->setQuantityWithReserve((int)$item->kiekis_su_rezervuotom);
                $product->setPrice((float)$item->savikaina);

                $parsedProductList[] = $product;
            }
        }

        return $parsedProductList;
    }
}

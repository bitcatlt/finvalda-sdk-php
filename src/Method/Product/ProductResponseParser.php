<?php

namespace Finvalda\Method\Product;

use Finvalda\Http\ResponseInterface;
use Finvalda\Method\Models\Product;
use Finvalda\Method\ResponseTrait;

class ProductResponseParser
{
    use ResponseTrait;

    public function extractProducts(ResponseInterface $providerResponse):array
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
                $product->setPrice((float)($item->kaina1_san ?? $item->savikaina));
                $product->setOtherPrices([
                    'price_b2b_1' => (float)($item->kaina2_san ?? 0),
                    'price_b2b_2' => (float)($item->kaina3_san ?? 0),
                    'price_b2b_3' => (float)($item->kaina4_san ?? 0),
                    'price_b2b_4' => (float)($item->kaina5_san ?? 0),
                    'price_b2b_5' => (float)($item->kaina6_san ?? 0)
                ]);

                $parsedProductList[] = $product;
            }
        }

        return $parsedProductList;
    }
}

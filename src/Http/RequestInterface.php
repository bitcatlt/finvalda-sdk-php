<?php

namespace Finvalda\Http;

interface RequestInterface
{
    const TYPE_PRODUCT = 'ProductRequest';
    const TYPE_ORDER_RESERVATION = 'OrderReservationRequest';

    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getProvider();
}

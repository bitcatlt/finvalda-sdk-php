<?php

namespace Finvalda\Http;

interface RequestInterface
{
    const TYPE_PRODUCT = 'ProductRequest';
    const TYPE_ORDER_RESERVATION = 'OrderReservationRequest';
    const TYPE_INSERT_COMPANY = 'InsertCompanyRequest';
    const TYPE_INSERT_CUSTOMER = 'InsertCustomeRequest';
    const TYPE_INSERT = 'InsertRequest';

    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getProvider();
}

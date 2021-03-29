<?php

namespace Finvalda\Http;

interface RequestInterface
{
    const TYPE_PRODUCT = 'ProductRequest';
    const TYPE_GET_COMPANY = 'GetCompanyRequest';
    const TYPE_ORDER_RESERVATION = 'OrderReservationRequest';
    const TYPE_INSERT_COMPANY = 'InsertCompanyRequest';
    const TYPE_INSERT_CUSTOMER = 'InsertCustomerRequest';
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

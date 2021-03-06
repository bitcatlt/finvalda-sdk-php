<?php

namespace Finvalda\Http;

interface RequestInterface
{
    const TYPE_PRODUCT = 'ProductRequest';
    const TYPE_CHECK_PRODUCT = 'ProductCheckRequest';
    const TYPE_CHECK_SERVICE = 'ServiceCheckRequest';
    const TYPE_GET_COMPANY = 'GetCompanyRequest';
    const TYPE_GET_COMPANIES = 'GetCompaniesRequest';
    const TYPE_ORDER_RESERVATION = 'OrderReservationRequest';
    const TYPE_ORDER = 'OrderRequest';
    const TYPE_INSERT_COMPANY = 'InsertCompanyRequest';
    const TYPE_INSERT_CUSTOMER = 'InsertCustomerRequest';
    const TYPE_INSERT = 'InsertRequest';
    const TYPE_INSERT_PRODUCT = 'InsertProductRequest';
    const TYPE_INSERT_SERVICE = 'InsertProductRequest';
    const TYPE_ORDER_DELETE = 'OrderDeleteRequest';

    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getProvider();
}

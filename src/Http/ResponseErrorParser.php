<?php

namespace Finvalda\Http;

interface ResponseErrorParser
{
    /**
     * @param $response
     */
    public function isFaultyResponse($response):bool;
}

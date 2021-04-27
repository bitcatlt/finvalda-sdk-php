<?php

namespace Finvalda\Http;

interface ResponseParserInterface
{
    public function parseResponse(ResponseInterface $response);
}

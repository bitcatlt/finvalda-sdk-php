<?php

namespace Finvalda\Http;

interface InsertResponseParserInterface
{
    public function extractResponse(ResponseInterface $response);
}

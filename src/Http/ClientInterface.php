<?php

namespace Finvalda\Http;

use Finvalda\Method\Models\RequestModel;
use Psr\Log\LoggerInterface;

interface ClientInterface
{
    public function setLogger(LoggerInterface $logger);

    public function sendInsertRequest(RequestModel $insertRequestModel): array;

    public function sendDeleteRequest(RequestModel $insertRequestModel);
}

<?php

namespace Finvalda\Http;

use Finvalda\Method\Models\InsertRequestModel;
use Psr\Log\LoggerInterface;

interface ClientInterface
{
    public function setLogger(LoggerInterface $logger);

    public function sendInsertRequest(InsertRequestModel $insertRequestModel);
}

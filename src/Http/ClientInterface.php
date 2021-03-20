<?php

namespace Finvalda\Http;

use Psr\Log\LoggerInterface;

interface ClientInterface
{
    /**
     * Sets a logger.
     *
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger);
}

<?php

namespace Finvalda;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class Log implements LoggerInterface
{
    use LoggerTrait;

    private $handle;

    /**
     * Constructor
     */
    public function __construct(string $filename) {
        $this->handle = fopen($filename, 'a');
    }

    public function log($level, $message, array $context = array()) {
        fwrite($this->handle, date('Y-m-d G:i:s') . ' - ' . print_r($message, true) . "\n");
    }

    public function __destruct() {
        fclose($this->handle);
    }
}

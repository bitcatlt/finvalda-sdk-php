<?php

namespace Finvalda;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class Logger implements LoggerInterface
{
    use LoggerTrait;

    private $handle;

    /**
     * Constructor
     */
    public function __construct(string $filename) {
        $this->handle = fopen($filename, 'a');
    }

    public function log($level, $message, array $context = []) {
        fwrite($this->handle, '[' . date('Y-m-d G:i:s') . ']' . ' ' . $level . ': ' . $message . ' ' . print_r($context, true) . "\n");
    }

    public function __destruct() {
        fclose($this->handle);
    }
}

<?php

namespace Zane\Logger;

/**
 * Defines a logger storage handler.
 */
interface StorageInterface
{
    /**
     * Sends a log message to the storage.
     *
     * @param mixed  $level   The log level.
     * @param string $message The log message.
     *
     * @return void Returns nothing.
     */
    public function log($level, $message): void;
}

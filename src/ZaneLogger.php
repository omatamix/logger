<?php

namespace Zane\Logger;

/**
 * The zane logger interface.
 */
interface ZaneLogger
{
    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level   The log level.
     * @param string $message The log message.
     * @param array  $context The log context.
     *
     * @throws \Psr\Log\InvalidArgumentException If the implementation does not support this log level.
     *
     * @return void Returns nothing.
     */
    public function log($level, $message, array $context = []): void;
}

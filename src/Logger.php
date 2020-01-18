<?php

namespace Zane\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

/**
 * The application logger.
 */
class Logger implements LoggerInterface
{
    use LoggerTrait;

    /** @var \Zane\Logger\Storage $storage A method of storing the logs. */
    public Storage $storage;

    /**
     * Constuct a new logger.
     *
     * @param \Zane\Logger\Storage $storage A method of storing the logs.
     *
     * @return void Returns nothing.
     */
    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level   The log level.
     * @param string $message The log message.
     * @param array  $context The log context.
     *
     * @return void Returns nothing.
     */
    public function log($level, $message, array $context = array()): void
    {
        $replace = [];
        foreach ($context as $key => $val) {
            if (!is_array($val) && (!is_object($val) || method_exists($val, '__toString'))) {
                $replace['{' . $key . '}'] = $val;
            }
        }
        $message = strtr($message, $replace);
        $this->storage->log($level, $message);
    }
}

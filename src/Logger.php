<?php

namespace Zane\Logger;

use Psr\Log\{
    InvalidArgumentException,
    LoggerInterface,
    LoggerTrait,
    LogLevel
};

/**
 * The application logger.
 */
class Logger implements LoggerInterface
{
    use LoggerTrait;

    /** @var \Zane\Logger\StorageInterface $storage A method of storing the logs. */
    public StorageInterface $storage;

    /** @var array $acceptedLogLevels A list of supported log levels. */
    public array $acceptedLogLevels = [
        LogLevel::EMERGENCY,
        LogLevel::ALERT,
        LogLevel::CRITICAL,
        LogLevel::ERROR,
        LogLevel::WARNING,
        LogLevel::NOTICE,
        LogLevel::INFO,
        LogLevel::DEBUG,
    ];

    /**
     * Constuct a new logger.
     *
     * @param \Zane\Logger\StorageInterface $storage A method of storing the logs.
     *
     * @return void Returns nothing.
     */
    public function __construct(StorageInterface $storage)
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
     * @throws \Psr\Log\InvalidArgumentException If the implementation does not support this log level.
     *
     * @return void Returns nothing.
     */
    public function log($level, $message, array $context = []): void
    {
        if (!in_array($level, $this->acceptedLogLevels)) {
            throw InvalidArgumentException('The current implementation does not support this log level.');
        }
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

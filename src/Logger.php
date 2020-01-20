<?php

namespace Zane\Logger;

use Psr\Log\{
    LoggerAwareInterface,
    LoggerAwareTrait,
    LoggerInterface
};
use Psr\Log\NullLogger;

/**
 * The application logger.
 */
class Logger implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * Construct the application logger.
     *
     * @param \Psr\Log\LoggerInterface|null The logger.
     *
     * @return void Returns nothing.
     */
    public function __construct(LoggerInterface $logger = null)
    {
        !$logger ? $this->setLogger(new NullLogger()) : $this->setLogger($logger);
    }

    /**
     * Returns the logger instance.
     *
     * @throws \RuntimeException If the logger instance could not be allocated.
     *
     * @return Returns the instance of the logger.
     */
    public function __invoke(): LoggerInterface
    {
        return $this->logger;
    }
}

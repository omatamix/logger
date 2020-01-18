<?php

namespace Zane\Logger;

use Psr\Log\LoggerInterface;

/**
 * The application logger.
 */
class Logger implements LoggerInterface
{
    /**
     * System is unusable.
     *
     * @param string $message The log message.
     * @param array  $context The log context.
     *
     * @return void Returns nothing.
     */
    public function emergency(string $message, array $context = array())
    {
        
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message The log message.
     * @param array  $context The log context.
     *
     * @return void Returns nothing.
     */
    public function alert(string $message, array $context = array())
    {
        
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message The log message.
     * @param array  $context The log context.
     *
     * @return void Returns nothing.
     */
    public function critical(string $message, array $context = array())
    {
        
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message The log message.
     * @param array  $context The log context.
     *
     * @return void Returns nothing.
     */
    public function error(string $message, array $context = array())
    {
        
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message The log message.
     * @param array  $context The log context.
     *
     * @return void Returns nothing.
     */
    public function warning(string $message, array $context = array())
    {
        
    }

    /**
     * Normal but significant events.
     *
     * @param string $message The log message.
     * @param array  $context The log context.
     *
     * @return void Returns nothing.
     */
    public function notice(string $message, array $context = array())
    {
        
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message The log message.
     * @param array  $context The log context.
     *
     * @return void Returns nothing.
     */
    public function info(string $message, array $context = array())
    {
        
    }

    /**
     * Detailed debug information.
     *
     * @param string $message The log message.
     * @param array  $context The log context.
     *
     * @return void Returns nothing.
     */
    public function debug($message, array $context = array())
    {
        
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
    public function log($level, $message, array $context = array())
    {
        
    }
}

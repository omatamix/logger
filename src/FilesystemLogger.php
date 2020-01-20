<?php

namespace Zane\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

use function fclose;
use function fopen;
use function fwrite;

/**
 * The filesystem logger.
 */
class FilesystemLogger implements ZaneLogger, LoggerInterface
{
    use InterpolateTrait, LogLevelTrait, LoggerTrait;

    /** @var string $path The path in which to store the logs. */
    protected $path; 

    /** @var string $namespace The file namespace to use. */
    protected $namespace;

    /**
     * Construct the filesystem logger.
     *
     * @param string $path      The path in which to store the logs.
     * @param string $namespace The file namespace to use.
     *
     * @return void Returns nothing.
     */
    public function __construct(string $path, string $namespace = 'zane-logs')
    {
        $this->path = $path;
        $this->namespace = $namespace;
    }

    /**
     * Preform the logger event.
     *
     * @param mixed  $level     The log level to run.
     * @param string $message   The log message to pass.
     * @param array  $context   The log context array to replace.
     * @param string $namespace The file namespace to overwrite.
     *
     * @return void Returns nothing.
     */
    public function log($level, string $message, array $context = [], $namespace = '')
    {
        $this->check($level);
        $message = $this->interpolate($message, $context);
        if ($namespace === '') {
            $namespace = $this->namespace;
        }
        $handle = fopen($this->path . $namespace . '.txt', "a");
        fwrite($handle, "{$message} \n");
        fclose($handle);
    }
}

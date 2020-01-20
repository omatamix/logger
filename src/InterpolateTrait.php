<?php

namespace Zane\Logger;

/**
 * The interpolate trait.
 */
trait InterpolateTrait
{
    /**
     * Interpolates context values into the message placeholders.
     *
     * @param string $message   The log message to pass.
     * @param array  $context   The log context array to replace.
     *
     * @return string Returns the binded message.
     */
    public function interpolate(string $message, array $context = []): string
    {
        $replace = [];
        foreach ($context as $key => $val) {
            if (!is_array($val) && (!is_object($val) || method_exists($val, '__toString'))) {
                $replace['{' . $key . '}'] = $val;
            }
        }
        return strtr($message, $replace);
    }
}

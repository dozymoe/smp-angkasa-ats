<?php
/**
 * See https://codereview.stackexchange.com/q/145239
 */

namespace App\Extensions;


class ExceptionFormatter
{
    /** @var \Exception|\Throwable */
    private $exception;

    /** @var string */
    private $formattedString;

    /**
     * @param \Exception|\Throwable $exception
     */
    private function __construct($exception)
    {
        $this->exception = $exception;
        $this->formattedString = $this->formatException();
    }

    private function formatException()
    {
        return $this->formatExceptionMessage()
                .$this->formatExceptionTrace()
                .$this->getCauseIfApplicable();
    }

    private function formatExceptionMessage()
    {
        $exceptionClass = get_class($this->exception);
        $exceptionMessage = $this->exception->getMessage();

        $fileAndLine = $this->formatFileAndLine($this->exception->getFile(), $this->exception->getLine());

        if ($exceptionMessage === '')
            return "${exceptionClass} (${fileAndLine})\n";

        return "${exceptionClass}: ${exceptionMessage} (${fileAndLine})\n";
    }

    private function formatFileAndLine($file, $line)
    {
        return "${file}:${line}";
    }

    private function formatExceptionTrace()
    {
        $exceptionTrace = array_slice($this->exception->getTrace(), 0, 20);

        $formattedTrace = [];

        foreach($exceptionTrace as $trace) {
            $formattedTrace[] = "\tat ".$this->formatTraceElement($trace);
        }

        return implode("\n", $formattedTrace);
    }

    private function formatTraceElement($traceElement)
    {
        $fileAndLine = $this->formatFileAndLine(
            isset($traceElement['file']) ? $traceElement['file'] : 'unknown',
            isset($traceElement['line']) ? $traceElement['line'] : 'unknown'
        );

        if ($this->isFunctionCall($traceElement)) {
            $functionCall = $this->formatFunctionCall($traceElement);
            $arguments = $this->formatArguments($traceElement);

            return "${functionCall}(${arguments}) (${fileAndLine})";
        }

        return $fileAndLine;
    }

    private function isFunctionCall($traceElement)
    {
        return array_key_exists('function', $traceElement);
    }

    private function formatFunctionCall($traceElement)
    {
        return (isset($traceElement['class']) ? $traceElement['class'] : '')
                .(isset($traceElement['type']) ? $traceElement['type'] : '')
                .$traceElement['function'];
    }

    private function formatArguments($traceElement)
    {
        if (empty($traceElement['args']))
        {
            return '';
        }
        /** @var string[] $arguments */
        $arguments = $traceElement['args'];

        $formattedArgs = [];
        foreach ($arguments as $arg) {
            $formattedArgs[] = $this->formatArgument($arg);
        }

        return implode(', ', $formattedArgs);
    }

    private function formatArgument($arg)
    {
        if (is_string($arg)) {
            return "\"".$arg."\"";
        } else if (is_array($arg)) {
            return 'Array';
        } else if ($arg === null) {
            return 'null';
        } else if (is_bool($arg)) {
            return $arg ? 'true' : 'false';
        } else if (is_object($arg)) {
            return get_class($arg);
        } else if (is_resource($arg)) {
            return get_resource_type($arg);
        } else {
            return $arg;
        }
    }

    private function getCauseIfApplicable()
    {
        $previousException = $this->exception->getPrevious();
        if ($previousException !== null)
            return "\nCaused by: " . self::format($previousException);

        return '';
    }

    /**
     * Converts an Exception to a Java-style stack trace string.
     * 
     * @param \Exception|\Throwable The Exception/Throwable to format as a "pretty" string. 
     * @return string
     */
    public static function format($exception)
    {
        $formatter = new ExceptionFormatter($exception);
        return $formatter->getFormattedString();
    }

    public function getFormattedString()
    {
        return $this->formattedString;
    }
}

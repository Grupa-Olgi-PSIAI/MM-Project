<?php

namespace core;


class ErrorHandler
{
    /**
     * Error handler. Convert all errors to Exceptions by throwing an ErrorException.
     *
     * @param int $level Error level
     * @param string $message Error message
     * @param string $file Filename the error was raised in
     * @param int $line Line number in the file
     *
     * @return void
     * @throws \ErrorException
     */
    public static function handleError($level, $message, $file, $line)
    {
        if (error_reporting() !== 0) {  // to keep the @ operator working
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    /**
     * Exception handler.
     *
     * @param \Exception $exception The exception
     *
     * @return void
     * @throws \Exception
     */
    public static function handleException($exception)
    {
        $code = $exception->getCode();
        if ($code != 404 && $code != 401) {
            $code = 500;
        }
        http_response_code($code);

        if (Config::showErrors()) {
            echo "<h1>Fatal error</h1>";
            echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
            echo "<p>Message: '" . $exception->getMessage() . "'</p>";
            echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
            echo "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
        } else {
            View::renderWithoutMenu("error/$code.html");
        }

        if (Config::logErrors()) {
            $log = dirname(__DIR__) . '/logs/' . date('Y-m-d') . '.log';
            ini_set('error_log', $log);
            $message = "Uncaught exception: '" . get_class($exception) . "'";
            $message .= " with message '" . $exception->getMessage() . "'";
            $message .= "\n\tStack trace: " . $exception->getTraceAsString();
            $message .= "\n\tThrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "\n";
            error_log($message);
        }
    }
}

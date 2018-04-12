<?php

namespace core;


abstract class View
{
    /**
     * Render a view file
     *
     * @param string $view The view file
     * @param array $args Associative array of data to display in the view (optional)
     *
     * @return void
     * @throws \Exception
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);
        $file = dirname(__DIR__) . "/view/$view";
        if (is_readable($file)) {
            self::renderMenu();
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
    }

    private static function renderMenu()
    {
        require dirname(__DIR__) . "/view/default.html";
    }
}

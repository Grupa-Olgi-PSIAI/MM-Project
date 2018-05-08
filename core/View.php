<?php

namespace core;


abstract class View
{
    /**
     * Render a view file with menus
     *
     * @param string $view The view file
     * @param array $args Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function render($view, $args = [])
    {
        $file = dirname(__DIR__) . "/view/$view";
        if (is_readable($file)) {
            self::renderHTML($file, $args);
        } else {
            throw new \RuntimeException("$file not found");
        }
    }

    /**
     * Render a view without menu
     *
     * @param string $view The view file
     * @param array $args Associative array of data to display in the view (optional)
     */
    public static function renderWithoutMenu($view, $args = [])
    {
        extract($args, EXTR_SKIP);
        $file = dirname(__DIR__) . "/view/$view";
        if (is_readable($file)) {
            self::renderHTML($file, $args, false);
        } else {
            throw new \RuntimeException("$file not found");
        }
    }

    private static function renderHTML($file, $args, $showMenu = true)
    {
        extract($args, EXTR_SKIP);

        require dirname(__DIR__) . "/view/header.html";
        if ($showMenu) {
            require dirname(__DIR__) . "/view/menu.html";
            require dirname(__DIR__) . "/view/top.php";
        }
        require $file;
        require dirname(__DIR__) . "/view/footer.html";
    }
}

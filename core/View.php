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
     * @throws \Exception
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);
        $file = dirname(__DIR__) . "/view/$view";
        if (is_readable($file)) {
            self::renderHTML($file);
        } else {
            throw new \Exception("$file not found");
        }
    }

    /**
     * Render a view without menu
     *
     * @param string $view The view file
     * @param array $args Associative array of data to display in the view (optional)
     *
     * @throws \Exception
     */
    public static function renderWithoutMenu($view, $args = [])
    {
        extract($args, EXTR_SKIP);
        $file = dirname(__DIR__) . "/view/$view";
        if (is_readable($file)) {
            self::renderHTML($file, false);
        } else {
            throw new \Exception("$file not found");
        }
    }

    private static function renderHTML($file, $showMenu = true)
    {
        self::renderHeader();
        if ($showMenu) {
            self::renderMenu();
        }
        require $file;
        self::renderFooter();
    }

    private static function renderMenu()
    {
        require dirname(__DIR__) . "/view/default.html";
    }

    private static function renderHeader()
    {
        require dirname(__DIR__) . "/view/header.html";
    }

    private static function renderFooter()
    {
        require dirname(__DIR__) . "/view/footer.html";
    }
}

<?php


class App
{
    public static function boot()
    {
        spl_autoload_register('App::autoload');
    }

    private static function autoload($name)
    {
        $file = __DIR__ . "/{$name}.php";
        if (file_exists($file)) include_once $file;
    }
}
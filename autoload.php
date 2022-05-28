<?php

spl_autoload_register(function ($class) {
    $file = realpath(__DIR__) . DIRECTORY_SEPARATOR . strtr($class, '\\', DIRECTORY_SEPARATOR) . '.php';
    if (file_exists($file)) {
        require $file;
        return true;
    }
    return false;
});

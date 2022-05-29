<?php

spl_autoload_register(function ($class) {
    $file = realpath(__DIR__) . DIRECTORY_SEPARATOR . str_replace('SapaVadim', 'src', strtr($class, '\\', DIRECTORY_SEPARATOR)) . '.php';
    if (file_exists($file)) {
        require $file;
        return true;
    }
    return false;
});

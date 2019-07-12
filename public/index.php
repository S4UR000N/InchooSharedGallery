<?php

//define base path, root path of our application
define('BP', dirname(__DIR__) . '/');

//enable error_reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

//autoload classes using namespaces
spl_autoload_register(function ($classname) {
    $file = BP . $classname . '.php';
    $file = str_replace('\\', '/', $file);
    if(file_exists($file)) { require_once($file); }
});

// enable 500 - Internal server error
function error_handler_argument_zip() { \app\layout\LayoutLoader::loadBasicHTML(); \app\extra\ErrorHandler::call500(); }
set_error_handler('error_handler_argument_zip');
set_exception_handler('error_handler_argument_zip');

//start app
app\extra\Port::open();
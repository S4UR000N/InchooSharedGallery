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

//enable 500(Internal Server Error)
function errorHandler($errno, $errstr, $errfile, $errline) {
    throw new Exception($errstr);
}
function exceptionHandler($e)
{
    \app\extra\ErrorHandler::saveInErrorsLog($e);
    \app\layout\LayoutLoader::loadBasicHTML();
    \app\extra\ErrorHandler::call500();
}
//set_error_handler('errorHandler');
//set_exception_handler('exceptionHandler');

//start app
app\extra\Port::open();
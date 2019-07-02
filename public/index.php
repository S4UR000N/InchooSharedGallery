<?php

//define base path, root path of our application
define('BP', __DIR__ . '/');

//enable error_reporting to see php errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

//set include path, this is where included classes will be found
$sip_implode = set_include_path(implode(PATH_SEPARATOR, array(
    BP.'app/model',
    BP.'app/controller',
)));

$implode = implode(PATH_SEPARATOR, array(
    'app/model',
    'app/controller',
));

echo BP . "<br>";
echo $implode . "<br>";
echo $sip_implode;

//register autoloader, to auto-include classes when needed
//spl_autoload_register(function($class) {
//    $classPath = strtr($class, '\\', DIRECTORY_SEPARATOR) . '.php';
//    return include $classPath;
//});

//start app
//App::start();
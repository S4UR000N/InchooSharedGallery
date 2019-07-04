<?php

// namespace
namespace app\extra;

final class Port
{
    public static function open()
    {
        //get path and remove '/'
        $path = Request::pathInfo();
        $path = trim($path, '/');

        //get path parts
        $pathparts = explode('_', $path);

        //set default Controller and Change it if path isn't root (/)
        $controller = "\app\controller\HomeController";
        if(!empty($pathparts[0]))
        {
            $controller = "\app\controller\\". ucfirst($pathparts[0]) . "Controller";
        }

        //set default Method and Change it if path isn't root (/)
        $method = (function ()
        {
            //dbl click 'requestMethod' and (ctrl + q) for documentation
            if(Request::isLogdIn())
            {
                return 'in';
            }
            return 'out';
        })();
        if(count($pathparts) == 2 && !empty($pathparts[1]))
        {
            $method = $pathparts[1];
        }

        // instantiate controller
        if(class_exists($controller))
        {
            $controller = new $controller;
        }
        else
        {
            header("HTTP/1.0 404 Not Found");
        }

        // run method
        if(method_exists($controller, $method))
        {
            $controller->$method();
        }
        else
        {
            header("HTTP/1.0 404 Not Found");

        }
    }
}
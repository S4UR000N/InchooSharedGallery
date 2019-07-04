<?php

// namespace
namespace app\extra;

final class Request
{
    public static function pathinfo()
    {
        //returns True if there is (/path) and False if root path (/)
        $server = new \app\super\Server();
        return $server->getRedirectURL();
    }

    /**
     * returns true on POST
     * returns false on GET
     */
    public static function requestMethod()
    {
        $server = new \app\super\Server();
        return $server->isPost();
    }

    /**
     * returns true if user is loged in
     * return false if user is NOT loged in
     */
    public static function isLogdIn()
    {
        $session = new \app\super\Session();
        return $session->isSet();
    }
}

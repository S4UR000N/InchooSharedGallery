<?php

// namespace
namespace app\extra;

final class Request
{
    /**
     * return $_GET
     */
    public static function get()
    {
        $get = new \app\super\Get();
        return $get->getGetDatasArray();
    }

    /**
     * return $_POST
     */
    public static function post()
    {
        $post = new \app\super\Post();
        return $post->getPostDatasArray();
    }

    /**
     * return $_FILES
     */
    public static function files()
    {
        $files = new \app\super\Files();
        return $files;
    }

    /**
     * return $_SESSION
     */
    public static function session()
    {
        $session = new \app\super\Session();
        return $session;
    }

    /**
     * returns true if there is (/path)
     * returns false if root path (/)
     */
    public static function pathinfo()
    {
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

    /**
     * return $_FILES as array
     */
    public static function filesAsArray()
    {
        $files = new \app\super\Files();
        $files->filesAsArray();
        return $files;
    }
}

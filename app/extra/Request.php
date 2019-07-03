<?php

// namespace
namespace app\extra;

final class Request
{
    public static function pathinfo()
    {
        $server = new \app\super\Server();
        if($server->getRedirectURL())
        {
            return $server->getRedirectURL();
        }
    }
}

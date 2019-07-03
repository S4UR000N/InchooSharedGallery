<?php

// namespace
namespace app\extra;

final class Port
{
    public static function open()
    {
        $pathInfo = Request::pathInfo();
        var_dump($pathInfo);
    }
}
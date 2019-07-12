<?php

// namespace
namespace app\extra;


class ErrorHandler
{
    public static function call401($cond)
    {
        if($cond) {
            require BP . "public/errors/401.php";
            die();
        }
    }

    public static function call404()
    {
        return require BP . "public/errors/404.php";
    }

    public static function call500()
    {
        return require BP . "public/errors/500.php";
    }
}
<?php

// namespace
namespace app\super;

final class Server
{
    private $server;

    public function __construct()
    {
        $this->server = $_SERVER;
    }

    public function getRedirectURL()
    {
        if(in_array('REDIRECT_URL', $this->server)) {
            return $this->server['REDIRECT_URL'];
        }
        return false;
    }
}

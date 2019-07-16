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

    public function getServer()
    {
        return $this->server;
    }
    public function getRedirectURL()
    {
        if(array_key_exists('REDIRECT_URL', $this->server))
        {
            return $this->server['REDIRECT_URL'];
        }
        return false;
    }

    public function isPost()
    {
        if($this->server['REQUEST_METHOD'] === 'POST')
        {
            return true;
        }
        return false;
    }
}
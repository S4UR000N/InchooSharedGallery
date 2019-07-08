<?php

// namespace
namespace app\super;

final class Session
{
    private $session;

    public function __construct()
    {
        //start session if it's not already running
        if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }

        //add $_SESSION to our $session property
        $this->session = $_SESSION;
    }

    public function isSet() {
        if(array_key_exists("user_id", $this->session))
        {
            return true;
        }
        return false;
    }

    public function getSessionDatasArray()
    {
        return $this->get;
    }
}

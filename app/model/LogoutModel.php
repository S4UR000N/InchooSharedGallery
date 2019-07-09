<?php

// namespace
namespace app\model;

class LogoutModel
{
    public function __construct()
    {
        // Destroy Session
        session_destroy();

        // Redirect
        header("location: http://shared-gallery.loc/");
    }
}
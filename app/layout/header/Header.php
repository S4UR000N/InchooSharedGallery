<?php

// namespace
namespace app\layout\header;

final class Header
{
    public static function headerIn()
    {
        echo
        '
        <nav id = "nav" class = "navbar navbar-light pt-3 pb-3" style = "background-color: #0099CC;">
            <div id = "header" class = "container d-flex justify-content-around">
                <a href = \'http://shared-gallery.loc/\'><button class = \'btn btn-white text-dark\'>Home</button></a>
                <a href = \'http://shared-gallery.loc/user_management\'><button class = \'btn btn-white text-dark\'>Management</button></a>
                <a href = \'http://shared-gallery.loc/user_myaccount\'><button class = \'btn btn-white text-dark\'>MyAccount</button></a>
                <a href = \'http://shared-gallery.loc/user_logout\'><button class = \'btn btn-white text-dark\'>Logout</button></a>
            </div>
        </nav>
        ';
    }
    public static function headerOut()
    {
    echo
    '
    <nav id="nav" class="navbar navbar-light pt-3 pb-3" style="background-color: #0099CC;">
        <div id="header" class="container d-flex justify-content-around">
            <a href=\'http://shared-gallery.loc/\'><button class=\'btn btn-white text-dark\'>Home</button></a>
            <a href=\'http://shared-gallery.loc/user_login\'><button class=\'btn btn-white text-dark\'>Login</button></a>
            <a href=\'http://shared-gallery.loc/user_registration\'><button class=\'btn btn-white text-dark\'>Registration</button></a>
        </div>
    </nav>
    ';
    }
    public static function headerStyle()
    {}
}
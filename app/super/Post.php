<?php

// namespace
namespace app\super;

final class Post
{
    public static function post() {
        static $instance = null;
        if($instance === null)
        {
            return $instance = new self();
        }
        return $instance;
    }

    // Setter
    public function set($key, $val)
    {
        $_POST[$key] = $val;
    }

    // Getter
    public function get($key, $default = null)
    {
        if(isset($_POST[$key])) {
            return $_POST[$key];
        }
        return $default;
    }

    public function getPost()
    {
        return $_POST;
    }
}
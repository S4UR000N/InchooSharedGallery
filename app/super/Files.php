<?php

// namespace
namespace app\super;

final class Files
{
    // Singleton
    public static function files()
    {
        static $instance = null;
        if($instance === null)
        {
            return $instance = new self();
        }
        return $instance;
    }

    // Getter
    public function get($key)
    {
        if(isset($_FILES[$key])) {
            return $_FILES[$key];
        }
        return false;
    }

    public function getFiles() {
        return $_FILES;
    }
}

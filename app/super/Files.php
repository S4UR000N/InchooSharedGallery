<?php

// namespace
namespace app\super;

final class Files
{
    private $files;

    // Singleton
    public static function files()
    {
        static $instance = null;
        if ($instance === null) {
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

    public function filesAsArray() {
        $this->files = $_FILES;
        return $this->files;
    }
}

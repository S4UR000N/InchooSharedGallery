<?php

// namespace
namespace app\extra;

// use
use \PDO;

final class Connection
{
    // constants
    const SERVER_NAME = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = 'toor';
    const DATABASE_NAME = 'inchoo';

    // properties
    private $con;

    // constructor
    private function __construct()
    {
        $this->con = new PDO("mysql:host=" . self::SERVER_NAME . ";dbname=" . self::DATABASE_NAME, self::USERNAME, self::PASSWORD);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // singleton
    public static function getInstance() {
        static $instance = null;
        if($instance === null)
        {
            $instance = new self();
        }
        return $instance;
    }

    public function getCon()
    {
        return $this->con;
    }
}
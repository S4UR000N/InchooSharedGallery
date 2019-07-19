<?php

// namespace
namespace app\controller;

class CollectionController
{
    public function test()
    {
        // estsblish DB connection and get all files data
        $con = \app\extra\Connection::getInstance()->getCon();
        $queryData = $con->query("SELECT * FROM files;")->fetchAll(\PDO::FETCH_OBJ);

        // inst collection and pass FileModel
        $files = new \app\extra\Collection($queryData, 'FileModel');
        $files->each(function($file, $key) {
            echo $key . ":" . $file->file_id . "::" . $file->file_name . "<br>";
        });

        /*
        $wht = $files->echoEach(function($file, $key) {
            return $key . ":" . $file->file_id . "::" . $file->file_name . "<br>";
        });
        var_dump($wht);
        */
    }
}